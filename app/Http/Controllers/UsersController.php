<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function index()
    {
        $Users = User::all();
        return view ('Backend.users.index', compact('Users'));
    }

    public function shop()
    {
        return view('Backend.users.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|min:3',
            'password_confirm' => 'required|min:1'
        ]);

        $user_exist = User::where('email',$request->email)->exists();

        if ( $user_exist ) return redirect()->route('users.shop')->with('exists','ok');
        if ( $request->password != $request->password_confirm ) return redirect()->route('users.shop')->with('password','ok');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.show')->with('created','ok');

    }

    public function edit($id){

        $user = User::FindOrFail($id);
        return view('Backend.users.edit', compact('user'));
    }

    public function update($id)
    {
        $update = User::FindOrFail($id);
        $update->update(Request()->all());

        return redirect()->route('users.edit',$id)->with('updated','ok');
    }

    public function delete($id)
    {
        $current_user = Auth::id();

        if ( $current_user == $id ) return redirect()->route('users.show')->with('no_delete','ok');

        $delete = User::FindOrFail($id);
        $delete->delete();

        return redirect()->route('users.show')->with('deleted','ok');
    }
}

