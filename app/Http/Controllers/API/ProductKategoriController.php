<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ProductKategori;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProductKategoriController extends Controller
{
    //
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit =$request->input('limit');
        $nama = $request->input('nama');
        $show_product = $request->input('show_product');

        if($id)
        {
            $kategori = ProductKategori::with(['products'])->find($id);

            if($kategori)
            {
                return ResponseFormatter::success(
                    $kategori,'Data produk berhasil diambil'
                );
            }else{
                return ResponseFormatter::error(
                    null, 'Data Produk tidak ada', 404
                );
            }
        }
        $kategori=ProductKategori::query();

      
        if($nama){
            $kategori->where('kategori_nama', 'Like','%'.$nama.'%');
        }
     
        return ResponseFormatter::success(
            $kategori->paginate($limit),
            'data produk berhasil diambil'
        );
    }
}
