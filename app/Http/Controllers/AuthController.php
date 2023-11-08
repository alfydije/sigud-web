<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request){
        $response = Http::post('http://2.10.12.213:8000/api/login', [
            'username' => 'superAdmin',
            'password' => 'password',
    ]);
    }
}
