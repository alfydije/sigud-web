<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class BrandController extends Controller
{
    public function Brand()
    {
        $apiToken = Session::get('token');
        if (!$apiToken) {
            return redirect('/login')->with('error', 'Authentication token not found.');
        }

        $response = Http::withToken($apiToken)->get(env('HOST').'/api/brand');

        if ($response->successful()) {
            $brandData = $response->json()['data'];
            return view('Master_Data.Brand.index', ['brandData' => $brandData]);
        } else {
            $statusCode = $response->status();
            $errorBody = $response->body();
            Log::error("Brand data request failed with status code: $statusCode. Response body: $errorBody");

            return redirect('/')->with('error', 'Failed to retrieve brand data.');
        }
    }

    public function store(Request $request) 
    {
    $apiToken = Session::get('token');
    
    try {
        $response = Http::withToken($apiToken)->post(env('HOST').'/api/brand', [
            'nama_brand' => $request->namaBrand,
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
            throw new \Exception('Failed to add brand data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding brand data: ' . $e->getMessage());
        return $e->getMessage();
        }
    }

    public function edit(Request $request)//edit
    {
        try{
        $response = Http::withToken(Session::get('token'))->get(env('HOST')."/api/brand/{$request->id}");
        Log:info($response->json());

        if ($response->successful()) {
            $brandData = $response->json()['data'];
            return response()->json([
                'kode' => 201,
                'status' => true,
                'message' => "Data Berhasil di Tambahkan",
                'data' => $brandData,
        ]);
        } else {
            throw new \Exception('Failed to add brand data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding brand data: ' . $e->getMessage());
        return $e->getMessage();
        }

    }

    public function update(Request $request, $id)
    {
        $apiToken = Session::get('token');
    
    try {
        $response = Http::withToken($apiToken)->put(env('HOST').'/api/brand/'.$id, [
            'nama_brand' => $request->namaBrand,
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
            throw new \Exception('Failed to update brand data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding brand data: ' . $e->getMessage());
        return $e->getMessage();
        }
    }

    public function delete(Request $request){
        try{
            $response = Http::withToken(Session::get('token'))->delete(env('HOST')."/api/brand/{$request->id}");
            Log:info($response);
            if ($response->successful()) {
                return response()->json([
                    'kode' => 201,
                    'status' => true,
                    'message' => "Data Berhasil dihapus",
                    'data' => null,
            ]);
            } else {
                throw new \Exception('Failed to delete brand data');
            }
        }
        catch (\Exception $e) {
            Log::error('Error while adding brand data: ' . $e->getMessage());
            return $e->getMessage();
            }
    }

}