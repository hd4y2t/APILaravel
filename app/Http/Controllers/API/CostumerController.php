<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Costumer;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Password as FacadesPassword;

class CostumerController extends Controller
{
    //
    public function register(Request $request)
    {
        try{
         $request->validate([
            'kode' =>['required','string','max:255','unique:costumer'],
            'nama' =>['required','string','max:255'],
            'username' =>['required','string','max:255','unique:costumer'],
            'email' => ['required', 'string','email','max:255','unique:costumer'],
            'password' => ['required', 'string', Password::min(3)],
            'alamat' => ['required', 'string'],
            'nohp' => ['required', 'string'], 
         ]);   
         Costumer::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'username' =>$request->username,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'alamat'=> $request->alamat,
            'nohp'=> $request->nohp
         ]);

         $costumer= Costumer::where('kode', $request->kode)->first();

         $tokenResult= $costumer->createToken('authToken')->plainTextToken;

         return ResponseFormatter::success([
            'access_token'=> $tokenResult,
            'token_type'=> 'Bearer',
            'costumer'=> $costumer
         ], 'Costumer Terdaftar');
        }catch(Exception $error){
            return ResponseFormatter::error([
                'message' => 'Something went wrong!',
                'error' => $error,
                // 'costumer' => $costumer,
             ], 'Costumer gagal daftar',500);
        }
    }

    public function login(Request $request)
    {
        
    }
}
