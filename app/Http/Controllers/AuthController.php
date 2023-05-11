<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\AuthService;

use Exception;

class AuthController extends Controller
{
    public function __construct(){
        $this->authService = new AuthService();
    }
    public function index()
    {
        return view('pages.auth.main');
    }
    public function do_login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        
        $login = $this->authService->login($email, $password);
        if ($login) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Selamat datang ' . $login->user->name,
                'callback' => route('dashboard'),
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, email atau password anda salah, silahkan coba lagi.',
            ]);
        }
    }

    public function do_logout()
    {
        if (session()->has('auth_token')) {
            session()->remove('auth_token');
        }

        return redirect()->route('auth');
    }
}

