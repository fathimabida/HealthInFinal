<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {


        $data = [
            'title' => 'Healthin - Login Page'
        ];


        return view('auth.login', $data);
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // dd(Auth::guard('employee')->attempt($infologin));


        if (Auth::guard('admin')->attempt($infologin)) {
            return redirect()->intended('/admin'); //ganti buat arahin ke homepage admin

        } elseif (Auth::guard('employee')->attempt($infologin)) {
            return redirect()->intended('/employee');

        } elseif (Auth::guard('mahasiswa')->attempt($infologin)) {
            return redirect()->intended('/mahasiswa');


        }elseif(Auth::guard('dokter')->attempt($infologin)){
            return redirect()->intended('/dokter');

        }elseif(Auth::guard('konselor')->attempt($infologin)){
            return redirect()->intended('/konselor');

        }else{
            return redirect('/')->withErrors('Username dan Password tidak sesuai')->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
