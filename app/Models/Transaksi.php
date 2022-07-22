<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transaksi_kode',
        'transaksi_costumer',
        'transaksi_address',
        'transaksi_total',
        'transaksi_shipping_price',
        'transaksi_status',
        'transaksi_payment'
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class,'costumer_kode', 'transaksi_costumer');
    }

    public function items()
    {
        $this->hasMany(Transaksi::class, 'item_transaksi', 'transaksi_kode');
    }
}
