<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\InventoryTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->with('category');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('product_name', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%");
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('stock_status')) {
            if ($request->input('stock_status') === 'low') {
                $query->where('stock_quantity', '<=', 10)->where('stock_quantity', '>', 0);
            } elseif ($request->input('stock_status') === 'out') {
                $query->where('stock_quantity', '<=', 0);
            }
        }

        $products = $query->paginate(15);
        $categories = Category::all();

        return view('admin.inventory.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.inventory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,category_id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'brand' => 'nullable|string|max:100',
            'pet_type' => 'nullable|string|max:60',
            'image_url' => 'nullable|url',
        ]);

        $product = Product::create($validated);

        // Log initial stock as a transaction
        InventoryTransaction::create([
            'product_id' => $product->product_id,
            'user_id' => Auth::id(),
            'quantity_change' => $product->stock_quantity,
            'type' => 'adjustment',
            'note' => 'Initial stock on creation',
        ]);

        return redirect()->route('admin.inventory.index')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.inventory.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'product_name' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,category_id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'brand' => 'nullable|string|max:100',
            'pet_type' => 'nullable|string|max:60',
            'image_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        $oldStock = $product->stock_quantity;
        $product->update($validated);

        $newStock = (int)$request->input('stock_quantity');

        if ($oldStock !== $newStock) {
            InventoryTransaction::create([
                'product_id' => $product->product_id,
                'user_id' => Auth::id(),
                'quantity_change' => $newStock - $oldStock,
                'type' => 'adjustment',
                'note' => 'Manual stock update',
            ]);
        }

        return redirect()->route('admin.inventory.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $product = Product::findOrFail($id);
                $product->delete();
            });
        } catch (\Throwable $e) {
            return redirect()->route('admin.inventory.index')->with('error', 'An error occurred while deleting the product.');
        }
        return redirect()->route('admin.inventory.index')->with('success', 'Product deleted successfully.');
    }
}
