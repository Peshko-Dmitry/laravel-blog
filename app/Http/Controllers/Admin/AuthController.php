<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\LoginAdminRequest;
use App\Http\Requests\LoginRequest;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('admin.auth.login');
    }
    public function login(LoginAdminRequest $request){

        $admin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        // dd($user);
        if(auth('admin')->attempt($admin)){
            
            return redirect(route('admin.index'));
        }
        return redirect(route('admin.login'))->withErrors(['email'=>'Пользователь не найден, проверте правильность ввода данных']);

    }
    public function logout(){
        auth('admin')->logout();
        return redirect(route('home'));
    }
    public function index(){
        
        return view('admin.index');
    }
    public function showEdit(){
        $admin = AdminUser::where(['email'=>auth('admin')->user()->email])->first();
        return view('admin.edit', [
            'admin'=>$admin,
        ]);
    }
    public function edit(AdminRequest $request){
        
        $admin = AdminUser::where(['email'=>auth('admin')->user()->email])->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
      
        $admin->save();
        auth('admin')->logout();
        $text = 'Ваш пароль был изменен!';
        session()->flash('text', $text);
        return redirect(route('admin.login'));
    }
}
