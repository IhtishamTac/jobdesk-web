<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function loginform()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Please fill all field.');
            return redirect()->back()->with('Error', 'Invalid field');
        }

        if (!Auth::attempt($request->only(['email', 'password']))) {
            Alert::warning('Warning', 'Username or Password incorrect!');
            return redirect()->back()->with('error', 'Username atau Password incorrect!');
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken("API TOKEN")->plainTextToken;

        if ($user->role == 'admin') {
            return redirect()->route('dashboard');
        } else if ($user->role == 'requiter') {
            return redirect()->route('reqdash');
        }
        return view('welcome');
    }

    public function logout()
    {
        if (auth()->check()) {
            auth()->user()->tokens()->delete();
            auth()->logout();

            return redirect()->route('loginform');
        }
    }


    public function registerform()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {

            return redirect()->back()->with('message', 'Email already used.');
        }

        $user = new User();
        $user->username = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();


        // return redirect()->back()->with('message', 'Terjadi kesalahan!');
    }
}
