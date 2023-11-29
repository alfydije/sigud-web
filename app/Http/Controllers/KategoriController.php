<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class KategoriController extends Controller
{
    

    public function kategori(Request $request)
    {
        
        $apiToken = Session::get('token');
        
        if (!$apiToken) {
            return redirect('/')->with('error', 'Authentication token not found.');
        }

        $response = Http::withToken($apiToken)->get(env('HOST').'/api/kategori');

       
        if ($response->successful()) {
            $nama_kategori = $response->json()['data'];
            return view('Master_Data.Kategori.index', ['nama_kategori' => $nama_kategori]);
        } else {
            $statusCode = $response->status();
            $errorBody = $response->body();
            Log::error("Kategori data request failed with status code: $statusCode. Response body: $errorBody");
            return redirect('/')->with('error', 'Failed to retrieve kategori data.');
        }
    }
    
    
    public function store(Request $request)
    {
        
    
        $apiToken = Session::get('token');

        try{
            $response = Http::withToken($apiToken)->post(env('HOST').'/api/kategori',[
                'nama_kategori' => $request->namaKategori,
        ]);
        
        Log::info($response->json());
        // dd($request->all());
        if ($response->successful()) {
            return response()->json([
                'kode' => 201,
                'status' => true,
                'message' => "Data Berhasil di Tambahkan",
                'data' => null,
        ]);
        } else {
            throw new \Exception('Failed to add kategori data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding kategori data: ' . $e->getMessage());
        return $e->getMessage();
        }
    }
    public function edit(Request $request)//edit
    {
        try{
        $response = Http::withToken(Session::get('token'))->get(env('HOST')."/api/kategori/{$request->id}");
        Log:info($response->json());

        if ($response->successful()) {
            $namaKategori = $response->json()['data'];
            return response()->json([
                'kode' => 201,
                'status' => true,
                'message' => "Data Berhasil di Tambahkan",
                'data' => $namaKategori,
        ]);
        } else {
            throw new \Exception('Failed to add kategori data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding kategori data: ' . $e->getMessage());
        return $e->getMessage();
        }

    }

    public function update(Request $request, $id)
    {
        $apiToken = Session::get('token');
    
    try {
        $response = Http::withToken($apiToken)->put(env('HOST').'/api/kategori/'.$id, [
            'nama_kategori' => $request->namaKategori,
        ]);
        Log::info($response->json());
        // dd($request->all());
        if ($response->successful()) {
            return response()->json([
                'kode' => 201,
                'status' => true,
                'message' => "Data Berhasil diupdate",
                'data' => null,
        ]);
        } else {
            throw new \Exception('Failed to update kategori data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding kategori data: ' . $e->getMessage());
        return $e->getMessage();
        }
    }
    public function delete(Request $request){
        try{
            $response = Http::withToken(Session::get('token'))->delete(env('HOST')."/api/kategori/{$request->id}");
            Log:info($response);
            if ($response->successful()) {
                return response()->json([
                    'kode' => 201,
                    'status' => true,
                    'message' => "Data Berhasil dihapus",
                    'data' => null,
            ]);
            } else {
                throw new \Exception('Failed to delete kategori data');
            }
        }
        catch (\Exception $e) {
            Log::error('Error while adding kategori data: ' . $e->getMessage());
            return $e->getMessage();
            }
    }


}

        
        

  
    
