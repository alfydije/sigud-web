<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    public function kategori(Request $request)
    {
        
        $apiToken = Session::get('token');
        
        if (!$apiToken) {
            return redirect('/')->with('error', 'Authentication token not found.');
        }

        $response = Http::withToken($apiToken)->get(env('HOST').'/api/client');

       
        if ($response->successful()) {
            $nama_supplier = $response->json()['data'];
            return view('Master_Data.Pengguna.client', ['nama_supplier' => $nama_supplier]);
        } else {
            $statusCode = $response->status();
            $errorBody = $response->body();
            Log::error("Kategori data request failed with status code: $statusCode. Response body: $errorBody");
            return redirect('/')->with('error', 'Failed to retrieve kategori data.');
        }
    }
}
