<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        \Log::info('Login Request:', $request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            return response()->json(['message' => 'Login successful!', 'user' => $user], 200);
        }

        return response()->json(['message' => 'Invalid credentials.'], 401);
    }

    public function branches()
    {
        $branches = Branch::all(); 
        return $branches; 
    }
    
}
