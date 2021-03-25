<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMemberController extends Controller
{
    public function login(){
        if (Auth::guard('member')->check()) {
            return redirect(route('home'));
        }
        return view('member.login');
    }

    public function register(){
        if (Auth::guard('member')->check()) {
            return redirect(route('home'));
        }

        return view('member.register');
    }

    public function memberRegister(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students',
            // 'address' => 'required|string|max:200',
            // 'phone_number' => 'required|integer',
            'password' => 'required|min:8|confirmed|',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->address = "";
        $student->phone_number = "";
        $student->password = $request->password;
        $student->status = true;
        $student->save();

        return redirect(route('home'));
    }

    public function authenticate(Request $request){
        $this->validate($request, [
            'email' => 'required|string|exists:students,email',
            'password' => 'required|string',
        ]);

        // Inputan yg diambil
        $credentials = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            // Jika berhasil login

            return redirect(route('home'));

            //return redirect()->intended('/details');
        }
        // Jika Gagal
        return redirect()->back()->with('error', 'email / password tidak cocok');
    }

    public function logout(){
        Auth::guard('member')->logout();

        return redirect(route('home'));
    }
}