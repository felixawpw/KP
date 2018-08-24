<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, Auth;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    //
    public function show()
    {
    	return view('home');
    }

    public function login(Request $request)
	{
        $validatedData = $request->validate([
            'nrp' => 'required',
            'password' => 'required',
        ]);

        // $recaptcha = Input::get('g-recaptcha-response');

        // $client = new Client([
        //     'base_uri' => 'https://google.com/recaptcha/api/'
        //     ]);

        // $response = $client->post(
        //     'https://www.google.com/recaptcha/api/siteverify',
        //     ['form_params'=>
        //         [
        //             'secret'=>'6Lf_CmgUAAAAAGBDLzCl8x3N_zx4js6jZjQMqSU1',
        //             'response'=>$recaptcha
        //         ]
        //     ]
        // );
        // $body = json_decode((string)$response->getBody());
        
        // if (!$body->success)
        // {
        //     return redirect()->route('loginAdmin')->with('status', "0;Captcha Error. Pastikan anda sudah mengisi captcha.");
        // }

        $pengguna = User::find(substr($request->nrp, 1));
        $password = $request->password;
        $message = "1;Login Berhasil; Selamat datang di website MOB FT UBAYA!";
        $bindAsUser = true;
        
        if ($request->nrp[0] != 's')
            $message = "0;Login gagal; Pastikan anda login menggunakan format sNRP (s kecil diikuti NRP).";
        else if ($pengguna == null || $pengguna == "")
        {
            $message = '0;Login gagal; NRP atau password yang Anda masukkan salah.';
            \App\Log::insertLog("Error", null, null, null, "[Laravel Login] NRP not registered for ".$request->nrp);
        }
        // else if (!Adldap::auth()->attempt($request->nrp, $password, $bindAsUser))
        // {
        //     $message = "0;Login gagal. Password salah.";
        //     \App\Log::insertLog("Warning", null, null, null, "[Laravel Login] Invalid credential for ".$request->nrp);
        // }
        else if ($pengguna->panitia == null)
        {
            $message = "0;Login Gagal; Anda belum terdaftar pada sistem."; 
            \App\Log::insertLog("Error", null, null, null, "[Laravel Login] Invalid group for ".$request->nrp);
        }
        else 
        {
            if ($pengguna->panitia->Id_Divisi == 2 || 
                $pengguna->panitia->Id_Divisi == 5 || 
                $pengguna->panitia->Id_Divisi == 8 ||
                $pengguna->panitia->Id_Divisi == 9 ||
                $pengguna->panitia->Id_Divisi == 10)   
            {
                $message = "1;Login Berhasil; Selamat datang di website MOB FT UBAYA!";
                Auth::loginUsingId($pengguna->NRP);
                \App\Log::insertLog("Info", null, null, null, "[Laravel Login] Valid credential for ".substr($request->nrp, 1));   
            }
            else
            {
                $message = "0;Login gagal; Divisi tidak diijinkan masuk";
                \App\Log::insertLog("Warning", null, null, null, "[Laravel Login] Divisi restricted for ".$request->nrp);
                return redirect()->route('loginAdmin')->with('status', $message);
            }
            return redirect()->route('home')->with('status', $message);
        }
        return redirect()->route('loginAdmin')->with('status', $message);
	}

	public function logout()
	{
        if(Auth::user()->panitia != null || Auth::user()->panitia != "")
            $route = "loginAdmin";
        else
            $route = 'login';
            
        Auth::logout();
		return redirect()->route($route)->with('status', '1;Logout Berhasil; Sampai jumpa di lain waktu!');
	}
}
