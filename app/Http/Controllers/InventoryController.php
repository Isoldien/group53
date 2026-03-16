<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index()
    {
        
        $messages = DB::table("messages")->get();
        $no_of_low_stock = DB::table('products')->whereBetween('stock_quantity', [1, 10])->count();
        $no_of_out_of_stock = DB::table('products')->where("stock_quantity","=",0)->count();

        return view("admin.messages.index",compact('messages','no_of_low_stock','no_of_out_of_stock'));
    }
    public function show_message($message)
    {
        return view("admin.messages.show",compact('message'));
    }
}
