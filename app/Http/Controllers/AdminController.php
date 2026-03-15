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

class AdminController extends Controller
{
    //


    public function index_users()
    {

        $users = DB::table("users")->get();

        return view("admin.users.index", compact("users"));
    }

   public function edit_user($user)
   {
     try {


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
   public function delete_user($user)
   {
       //deleting all associated user information


           try {
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
                   if ($request->input("role") === UserRole::Admin->value) {
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

}
