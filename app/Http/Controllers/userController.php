<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class userController extends Controller
{
    //Show Register Form
    public function create() {
        return view('users.register');

    }
    
    //Create new User
    public function store(Request $request) {
        $formFields = $request->validate([
            'nameFirst' => ['required', 'min:3'],
            'nameLast' => ['required', 'min:3'],
            'email' => ['required','email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Admin permissions
        $formFields['idAdmin'] = 0;

        //Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')-> with('message', 'User successfully logged in');
    }



    //Show Register Form
    public function login() {
        return view('users.login');

    }

    //Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been successfully logged out.');
    }

    //Authenticate User
    public function authenticate(Request $request) {

        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in.');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        
    }

   
}
