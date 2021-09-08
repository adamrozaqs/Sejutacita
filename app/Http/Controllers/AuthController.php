<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/');
        } else {
            $request->session()->flash('error_login', 'Login Gagal, Cek Kembali Email dan Password');
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->input("password"));

        Admin::create($data);
        return redirect()->back();
    }
}
