<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // public function apiRegister(RegisterRequest $request){
    //     $userData = [
    //         'name' => $request->name,
    //         'role_id'=> 2,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ];
    //     $user = User::create($userData);
    //     $token = $user->createToken('my-app');
    
        
    //     return response()->json([
    //         'user' => $user,
    //         'token' => $token->plainTextToken
    //     ]);   
        
    // }

    // public function apiLogin(LoginRequest $request){
    //     $user = User::where('email', $request->email)->first();

    //     if(!$user || !Hash::check($request->password, $user->password)){
    //         return response()->json([
    //             'message' => 'Invalid credentials'
    //         ], 422);
    //     }

    //     $token = $user->createToken('my-app')->plainTextToken;

    //     return response()->json([
    //         'user' => $user,
    //         'token' => $token,
    //     ], 201);
    // }

    public function index(){
        $user = Auth::user();
        return response()->json([
            'message' => 'Index',
        ]);
    }

    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->name,
            'role_id' => 2,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login_form');
    }

    public function login(LoginRequest $request){
        $credentials = request(['email', 'password']);
        if(Auth::guard('web')->attempt($credentials)){
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Wrong credentials');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

}
