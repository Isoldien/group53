<?php

namespace App\Http\Controllers;

use App\enums\UserRole;
use App\Mail\AdminCreationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

/**
 * Controller for managing the administrative dashboard and user moderation features.
 */
class AdminController extends Controller
{

    //


    public function index_users(Request $request)
    {

        $query = User::query();
        if($request->filled('search')){
            $query->where("name", "LIKE", "%{$request->search}%")->
                orWhere("email", "LIKE", "%{$request->search}%");
        }
        if($request->filled('role')){
            $query->where("role", "=",$request->role);
        }
        $users = $query->withCount(["orders","reviews"])->orderBy("user_id", "desc")->paginate(5,["*"],"user_page");
        return view("admin.users.index", compact("users"));
    }

   public function edit_user($id)
   {
     try {
         $user = User::findOrFail($id);

         if ($this->user_exists($user->user_id)) {
             return view("admin.users.edit", compact("user"));
         } else
             return redirect()->route("allUsers")->with("error", "User does not exist");
     }
     catch (\Exception $exception)
     {
         return redirect()->route("allUsers")->with("error", "sorry an error occurred");
     }
   }
   public function delete_user($id)
   {
       //deleting all associated user information


           try {
               $user = User::findOrFail($id);
               DB::transaction(function () use ($user) {
                   $order = DB::table("orders")->where("user_id", "=", $user->user_id)->lockForUpdate()->first();
                   if($order) {
                       DB::table("order_items")->where("order_id", "=", $order->id)->lockForUpdate()->delete();
                       DB::table("orders")->where("user_id", "=", $user->user_id)->lockForUpdate()->delete();
                   }
                   DB::table("reviews")->where("user_id", "=", $user->user_id)->lockForUpdate()->delete();
                   DB::table("return_requests")->where("user_id", "=", $user->user_id)->lockForUpdate()->delete();

                   DB::table("contact_messages")->where("user_id", "=", $user->user_id)->lockForUpdate()->delete();
                   $cart = DB::table("carts")->where("user_id", "=", $user->user_id)->lockForUpdate()->first();
                   if($cart) {
                       DB::table("cart_items")->where("cart_id", "=", $cart->cart_id)->lockForUpdate()->delete();
                       DB::table("carts")->where("user_id", "=", $user->user_id)->lockForUpdate()->delete();
                   }
                   DB::table("users")->where("user_id", "=", $user->user_id)->lockForUpdate()->delete();
               });
               return redirect()->route("allUsers")->with("success", "Successfully deleted user with ID . " . $user->user_id);
           } catch (\Throwable $e) {
               return redirect()->route("allUsers")->with("error", "sorry an error occurred");
           }






   }
   //This method will also be used to make a user an admin of course
   public function update_user(Request $request){
       try {
           DB::transaction(function () use ($request) {
               $user = DB::table('users')->where('user_id', $request->user_id)->lockForUpdate()->first();
               if ($user) {
                   $request->validate([
                       'name' => ['required', 'string', 'max:255'],
                       'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                       'password' => ['required', 'confirmed', Rules\Password::defaults()],
                       'role' => ['required', Rule::enum(UserRole::class)],

                   ]);
                   if ($request->input("role") === UserRole::Admin->value && $user->role !== UserRole::Admin->value) {
                       $user = DB::table("users")->where("user_id", "=", $request->input("user_id"))->first();
                       Mail::to($request->input("email"))->send(new AdminCreationEmail($user));
                   }
                   $userId = $request->input('user_id');
                   DB::table('users')->where('user_id', "=", $userId)->update([
                       'name' => $request->input('name'),
                       'email' => $request->input('email'),
                       'password' => Hash::make($request->input('password')),
                   ]);


               } else
                   throw new \Exception("User does not exist");
           });
           return redirect()->route("allUsers")->with('success', "successfully updated user");
       } catch (\Throwable $e) {
           return redirect()->route("allUsers")->with("error", "sorry an error occurred");
       }


   }

   private function user_exists($user_id):bool
   {
        return DB::table("users")->where("user_id","=",$user_id)->exists();
   }


    public function index()
    {
        $productCount = \App\Models\Product::count();
        $lowStockCount = \App\Models\Product::whereBetween("stock_quantity", [1,10])->count();

        $outOfStockCount = \App\Models\Product::where("stock_quantity", "=", "0")->count();
        $orderCount = \App\Models\Order::count();
        $userCount = \App\Models\User::count();

        $recentTransactions = \App\Models\InventoryTransaction::with(['product', 'user'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $orders = \App\Models\Order::with('user', 'order_items.product')->orderBy('order_date', 'desc')->paginate(5, ['*'], 'orders_page');
        $users = \App\Models\User::withCount(['orders', 'reviews'])->orderBy('user_id', 'desc')->paginate(5, ['*'], 'users_page');

        return view('admin.dashboard', compact('productCount', 'lowStockCount', 'orderCount', 'userCount', 'recentTransactions', 'orders', 'users','outOfStockCount'));
    }

    public function deleteUser($id)
    {
        $user = \App\Models\User::findOrFail($id);

        // Manually cascade deletions due to database restrictions
        if (method_exists($user, 'orders')) {
            foreach ($user->orders as $order) {
                if (method_exists($order, 'order_items')) {
                    $order->order_items()->delete();
                }
                $order->delete();
            }
        }

        $relations = ['addresses', 'reviews', 'cart', 'returnRequests', 'contactMessages'];
        foreach ($relations as $relation) {
            if (method_exists($user, $relation)) {
                $user->$relation()->delete();
            }
        }

        try {
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\UserBannedMail($user->name ?? $user->full_name ?? 'User'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Failed to send ban email: " . $e->getMessage());
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully. An email has been dispatched notifying them.');
    }

    public function reviews()
    {
        $reviews = \App\Models\Review::with(['user', 'product'])->orderBy('review_date', 'desc')->paginate(10);
        return view('admin.reviews', compact('reviews'));
    }

    public function deleteReview($id)
    {
        $review = \App\Models\Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }

}
