<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    //
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $kode = $request->input('kode');
        $nama = $request->input('nama');
        $deskripsi = $request->input('deksripsi');
        $kategori = $request->input('kategori');


        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $product = Products::with(['kategori','galleries'])->find($id);

            if($product)
            {
                return ResponseFormatter::success(
                    $product,'Data produk berhasil diambil'
                );
            }else{
                return ResponseFormatter::error(
                    null, 'Data Produk tidak ada', 404
                );
            }
        }
        $product=Products::with(['kategori','galleries']);

        if($kode){
            $product->where('product_kode', 'Like','%'.$kode.'%');
        }
        if($nama){
            $product->where('product_nama', 'Like','%'.$nama.'%');
        }
        if($deskripsi){
            $product->where('product_deskripsi', 'Like','%'.$deskripsi.'%');
        }
        if($price_from){
            $product->where('product_price', '>=', $price_from );
        }
        if($price_to){
            $product->where('product_price', '<=', $price_to );
        }
        if($kategori){
            $product->where('product_kategori',$kategori);
        }

        return ResponseFormatter::success(
            $product->paginate($limit),
            'data produk berhasil diambil'
        );
    }
}
