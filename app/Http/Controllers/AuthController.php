<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ForgotMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Unique;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function logout(){
        auth('web')->logout();
        return redirect(route('home'));
    }
    public function showRegisterForm(){
        return view('auth.register');
    }
    public function showForgotForm(){
        return view('auth.forgot');
    }
    public function register(RegisterRequest $request){
        $user = User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password']),
        ]);
        if($user){
            auth('web')->login($user);
        }
        return redirect(route('home'));
    }
    public function login(LoginRequest $request){
        $user = [
            'email'=>$request['email'],
            'password'=>$request['password'],
        ];
        if(auth('web')->attempt($user)){
            return redirect(route('home'));
        }
        return redirect(route('login'))->withErrors(['email'=>'Пользователь не найден, повторитье попытку.']);
    }
    public function forgot(ForgotRequest $request)
    {
        $newPassword = uniqid();
        $data = [
            'email'=>$request->email,
        ];
        //находим пользователя по email 
        $user = User::where(['email'=>$data['email']])->first();
        //меняем емайл на новый в БД
        $user->password = bcrypt($newPassword);
        $user->save();
        //отправляем сообщение на емаил и передаем в класс  массив с необходимыми данными
        Mail::to($user->email)->send(new ForgotMail(['name'=>$user->name, 'password'=>$newPassword]));
        return redirect(route('home'));
        // $mail = [
        //     'mail'=>$request->mail,
        //     'password'=>
        // ]
    }
}
