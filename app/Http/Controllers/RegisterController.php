<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function register()
    {
        $data = [
            'title' => 'Healthin - Registration Page'
        ];


        return view('auth.register', $data);
    }

    /**
     * Display the specified resource.
     */
    public function proses_register(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'ttl' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mahasiswa',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // dd(bcrypt($request->password));

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'ttl' => $request->ttl,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Your account has been registered. You can now log in.');
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
}
