<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get()
    {
        $getUsers = User::all();
        return $getUsers;
    }
   
    public function create(Request $request)
    {
        $name =     $request->input('name');
        $email =    $request->input('email');
        $password = $request->input('password');
        $passwordCrypto = Hash::make($password);

        $newUser = User::create([
        'name'       =>     $name,
        'email'      =>     $email,
        'password'   =>     $passwordCrypto,
        ]);

        return $newUser;

    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $data = $request->all();
        $user->update($data);

        return $user;

    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        $user = $user->id;
        return response()->json(['Ordem id: ' => $user, 'Status' => 'Deletado']);
    
    }
}
