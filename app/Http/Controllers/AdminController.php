<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    //


    public function index_users()
    {

        $users = DB::table("users")->get();

        return view("admin.users.index", compact("users"));
    }

   public function edit_user(User $user)
   {
     if($this->user_exists($user->user_id)) {
         return view("admin.users.edit", compact("user"));
     }
     else
         return redirect()->route("allUsers")->with("error", "User does not exist");
   }
   public function delete_user(User $user)
   {
       //deleting all associated user information
       if($this->user_exists($user->user_id)) {
           DB::table("orders")->where("user_id", "=", $user->user_id)->delete();
           DB::table("reviews")->where("user_id", "=", $user->user_id)->delete();
           DB::table("return_requests")->where("user_id", "=", $user->user_id)->delete();
           DB::table("users")->where("user_id", "=", $user->user_id)->delete();
           DB::table("contact_messages")->where("user_id", "=", $user->user_id)->delete();
           $cartId = DB::table("carts")->where("user_id", "=", $user->user_id)->first();
           DB::table("cart_items")->where("cart_id", "=", $cartId)->delete();
           DB::table("carts")->where("user_id", "=", $user->user_id)->delete();


           return redirect()->route("allUsers")->with("success", "Successfully deleted user with ID . " . $user->user_id);
       }
       else{
           return redirect()->route("allUsers")->with("error", "User does not exist");
       }
   }

   public function update_user(Request $request){
       if($this->user_exists($request->user_id)) {
           $request->validate([
               'name' => ['required', 'string', 'max:255'],
               'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
               'password' => ['required', 'confirmed', Rules\Password::defaults()],

           ]);

           $userId = $request->input('user_id');
           DB::table('users')->where('user_id', "=", $userId)->update([
               'name' => $request->input('name'),
               'email' => $request->input('email'),
               'password' => Hash::make($request->input('password')),
           ]);

           return redirect()->route("allUsers")->with('success', "successfully updated user with id " . $userId);
       }
       else
           return redirect()->route("allUsers")->with("error", "User does not exist");

   }

   private function user_exists($user_id):bool
   {
        return DB::table("users")->where("user_id","=",$user_id)->exists();
   }

}
