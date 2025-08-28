<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $incomeFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        if (auth()->attempt(['name' => $incomeFields['loginname'], 'password' => $incomeFields['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
        
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }


    public function showSignupForm(Request $request)
    {
        return view('signup');
    }

    public function showSigninForm(Request $request)
    {
        return view('signin');
    }

    public function register(Request $request)
{
    return $this->store($request);
}

    public function store(Request $request)
    {
        // Validate and process the registration data
        $incomeFields = $request->validate([
            'name' => 'required|string|max:255|min:3', Rule::unique('users', 'name'),
            'email' => 'required|string|email|max:255', Rule::unique('users', 'email'),
            'password' => 'required|string|min:8',
        ]);

        $incomeFields['password'] = bcrypt($incomeFields['password']);
        $user = User::create($incomeFields);
        auth()->login($user);
        return redirect('/');
    }
}
