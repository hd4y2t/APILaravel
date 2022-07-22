<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_costumer',
        'item-product',
        'item_transaksi',
        'item_quantity'
    ];

    public function product()
    {
        return $this->hasOne(Product::class,'product_kode', 'item_product');
    }
}
