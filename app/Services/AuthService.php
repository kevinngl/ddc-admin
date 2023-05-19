<?php

namespace App\Services;

use App\Libraries\HttpCurl;

use Illuminate\Support\Facades\Session;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthService {

    private $baseUrl;
    private $httpCurl;

    public function __construct() {
        $this->key = env('JWT_SECRET');
        $this->baseUrl = env('API_BE_DDC');
        $this->httpCurl = new HttpCurl($this->baseUrl);
    }

    public function login($email, $password) {
        $params = [
            'email' => $email,
            'password' => $password,
        ];

        $params = json_encode($params);
        $url = $this->baseUrl . '/auth/login';
        $response = $this->httpCurl->post($params, $url);
        $response = json_decode($response, true);
        if ($response['success']) {
            $user = base64_decode($response['data']);
            $decoded = JWT::decode($response['data'], new Key($this->key, 'HS256'));
            
            if ($decoded->user->role->name === 'user') {
                return false;
            }

            Session::put('auth_token', $response['data']);
            Session::put('user', $decoded);

            return $decoded;
        }
        
        return false;
    }

}
