<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    public function Supplier(Request $request)
    {
     
        $apiToken = Session::get('token');
        
        if (!$apiToken) {
            return redirect('/')->with('error', 'Authentication token not found.');
        }

        $response = Http::withToken($apiToken)->get(env('HOST').'/api/supplier');
        if ($response->successful()) {
            $supplier = $response->json()['data'];
            return view('Master_Data.Supplier.index', ['supplier' => $supplier]);
        } else {
            $statusCode = $response->status();
            $errorBody = $response->body();
            Log::error(" data Supplier request failed with status code: $statusCode. Response body: $errorBody");
            return redirect('/')->with('error', 'Failed to retrieve data Supplier.');
        }
    }
        public function store(Request $request)
    {
        
    
        $apiToken = Session::get('token');

        try{
            $response = Http::withToken($apiToken)->post(env('HOST').'/api/supplier',[
                'nama_supplier' => $request->nama_supplier,
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
            throw new \Exception('Failed to add supplier data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding supplier data: ' . $e->getMessage());
        return $e->getMessage();
        }
    }
    public function edit(Request $request)//edit
    {
        try{
        $response = Http::withToken(Session::get('token'))->get(env('HOST')."/api/supplier/{$request->id}");
        Log:info($response->json());

        if ($response->successful()) {
            $nama_supplier = $response->json()['data'];
            return response()->json([
                'kode' => 201,
                'status' => true,
                'message' => "Data Berhasil di Tambahkan",
                'data' => $nama_supplier,
        ]);
        } else {
            throw new \Exception('Failed to add supplier data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding supplier data: ' . $e->getMessage());
        return $e->getMessage();
        }

    }
    public function update(Request $request, $id)
    {
        $apiToken = Session::get('token');
    
    try {
        $response = Http::withToken($apiToken)->put(env('HOST').'/api/supplier/'.$id, [
            'nama_supplier' => $request->nama_supplier,
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
            throw new \Exception('Failed to update supplier data');
        }
        } catch (\Exception $e) {
        Log::error('Error while adding kategori data: ' . $e->getMessage());
        return $e->getMessage();
        }
    }
    public function delete(Request $request){
        try{
            $response = Http::withToken(Session::get('token'))->delete(env('HOST')."/api/supplier/{$request->id}");
            Log:info($response);
            if ($response->successful()) {
                return response()->json([
                    'kode' => 201,
                    'status' => true,
                    'message' => "Data Berhasil dihapus",
                    'data' => null,
            ]);
            } else {
                throw new \Exception('Failed to delete supplier data');
            }
        }
        catch (\Exception $e) {
            Log::error('Error while adding supplier data: ' . $e->getMessage());
            return $e->getMessage();
            }
    }

}

