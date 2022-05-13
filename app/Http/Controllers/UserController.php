<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use App\Http\Requests\UserRegisterRequest;
use Nette\Schema\ValidationException;

class UserController extends Controller
{
    public function create()
    {
        return view('register');

    }

    public function store(UserRegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        session()->flash('success', 'User has been registered successfully');

        auth()->login($user);
        return redirect()->action([QuestionController::class, 'index']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('question.index');

    }

    public function createLogin(){
        return view('login');
    }

    public function login(UserLoginRequest $request){
        $attributes =['email'=>$request->email, 'password'=> $request->password];
        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect()->route('question.index');
        }
        return back()->withErrors(['email'=>'Email or password is incorrect']);
    }



}
