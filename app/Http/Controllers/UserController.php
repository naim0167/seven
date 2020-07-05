<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //IMPORTANT NOTE
use Illuminate\Support\Facades\Storage;//IMPORTANT NOTE
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


public function uploadAvatar(Request $request){
    if ($request->hasFile('image')) {
        User::uploadAvatar($request->image);
        return redirect()->back()->with('message','Image uploaded.');//success message
    }
    else {
        // return 'no image found';
        return redirect()->back()->with('error','Image not uploaded.');//success message
    }
    // dd($request->hasfile('image'));
}


public function index()
    {
        $data = [
            'name'=>'elon',
            'email'=>'elon3@gmail.com',
            'password'=>'password',
 
        ];
        // User::create($data);
        // $user = new User();
        // $user->name='naim';
        // $user->email='naim@gmail.com';
        // $user->password=bcrypt('password');
        // $user->save();

        $user = User::all();
        return $user;

        // User::where('id',6)->delete();
        // User::where('id',7)-> update(['name'=>'mian']);

        // dd($user);
        // var_dump($user);
        // DB::insert('insert i nto users (name,email,password) values (?,?,?)', 
        // ['naim','naim@gmail.com','password']);

        // DB:: update('update users set name= ? where id = ?',['mian',1]); 
        
        // $users=DB:: select('select * from users');
        // return $users;

        // DB::delete('delete from users where id=1');

        return view('home');
    }
} 