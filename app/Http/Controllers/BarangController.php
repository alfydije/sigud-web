<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class BarangController extends Controller
{
    public function Barang(Request $request)
    {
        $apiToken = Session::get('token');
        if (!$apiToken) {
            return redirect('/login')->with('error', 'Authentication token not found.');
        }

        $response = Http::withToken($apiToken)->get(env('HOST').'/api/barang');

        if ($response->successful()) {
            $barangData = $response->json()['data'];
            return view('Master_Data.Barang.index', ['barang' => $barangData]);
        } else {
            $statusCode = $response->status();
            $errorBody = $response->body();
            Log::error(" Barang request failed with status code: $statusCode. Response body: $errorBody");

            return redirect('/')->with('error', 'Failed to retrieve barang .');
        }
    }

    public function store(Request $request) 
    {
    $apiToken = Session::get('token');
    
    try {
        $response = Http::withToken($apiToken)->post(env('HOST').'/api/barang', [
            'kategori' => $request->namaBarang,
            'brand' => $request->namaBarang,
            'nama_barang' => $request->namaBarang,
            'gambar_barang' => $request->namaBarang,
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
            throw new \Exception('Failed to add data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding data: ' . $e->getMessage());
        return $e->getMessage();
        }
    }

    public function edit(Request $request)//edit
    {
        try{
        $response = Http::withToken(Session::get('token'))->get(env('HOST')."/api/barang/{$request->id}");
        Log:info($response->json());

        if ($response->successful()) {
            $barangData = $response->json()['data'];
            return response()->json([
                'kode' => 201,
                'status' => true,
                'message' => "Data Berhasil di ubah",
                'data' => $barangData,
        ]);
        } else {
            throw new \Exception('Failed to add brand data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding data: ' . $e->getMessage());
        return $e->getMessage();
        }

    }

    public function update(Request $request, $id)
    {
        $apiToken = Session::get('token');
    
    try {
        $response = Http::withToken($apiToken)->put(env('HOST').'/api/barang/'.$id, [
            'kategori' => $request->namaBarang,
            'brand' => $request->namaBarang,
            'nama_barang' => $request->namaBarang,
            'gambar_barang' => $request->namaBarang,
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
            throw new \Exception('Failed to update data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding data: ' . $e->getMessage());
        return $e->getMessage();
        }
    }

    public function delete(Request $request){
        try{
            $response = Http::withToken(Session::get('token'))->delete(env('HOST')."/api/barang/{$request->id}");
            Log:info($response);
            if ($response->successful()) {
                return response()->json([
                    'kode' => 201,
                    'status' => true,
                    'message' => "Data Berhasil dihapus",
                    'data' => null,
            ]);
            } else {
                throw new \Exception('Failed to delete data');
            }
        }
        catch (\Exception $e) {
            Log::error('Error while adding data: ' . $e->getMessage());
            return $e->getMessage();
            }
    }
}
