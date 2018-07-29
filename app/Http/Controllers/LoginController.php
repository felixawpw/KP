<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, Auth;
class LoginController extends Controller
{
    //
    public function show()
    {
    	return view('home');
    }

    public function login(Request $request)
	{
        $pengguna = User::find($request->nrp);
        $password = $request->password;
        $message = "";
        if ($pengguna == null)
            $message = '0;Login gagal. NRP atau password yang Anda masukkan salah.';
        else if ($pengguna->NRP != $password)
            $message = '0;Login Gagal. NRP atau password yang Anda masukkan salah.';
        else if ($pengguna->panitia == null)
			$message = "0;Login Gagal. NRP atau password yang Anda masukkan salah.";        
		else
        {
            Auth::loginUsingId($pengguna->NRP);
            return redirect()->route('home')->with('status', $message);
        }
        return $message;
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->back()->with('status', 'Anda berhasil terlogout');
	}
}
