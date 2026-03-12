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
      return view("admin.users.edit", compact("user"));
   }

   public function update_user(Request $request){

       $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 'confirmed', Rules\Password::defaults()],

       ]);

       $userId = $request->input('user_id');
       DB::table('users')->where('id', $userId)->update([
         'name' => $request->input('name'),
         'email' => $request->input('email'),
          'password' => Hash::make($request->input('password')),
       ]);

       return redirect()->route("allUsers")->with('success',"successfully updated user with id ".$userId);

   }

}
