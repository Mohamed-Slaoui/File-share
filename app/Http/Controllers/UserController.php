<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addUser(UserRequest $request){
        User::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('home');
    }

    public function logUser(UserRequest $request){
        $valide = $request->validated();

        if (Auth::attempt($valide)) {
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->withErrors([
                'error' => 'email or password is invalid'
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
