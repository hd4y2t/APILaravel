<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory,SoftDeletes;

/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_kode',
        'product_kategori',
        'product_nama',
        'product_deskripsi',
        'product_jumlah',
        'product_price',
        
    ];

    public function galleries()
    {
     return $this->hasMany(ProductGallery::class,'gallery_product','product_kode');   
    }  

    public function kategori()
    {
        return $this->belongsTo(ProductKategori::class,'kategori_kode', 'product_kategori');
    }
}
