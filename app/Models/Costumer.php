<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Costumer extends Model
{
    use HasApiTokens;
    use HasFactory;

    protected $table = 'costumer';

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode',
        'nama',
        'username',
        'email',
        'password',
        'alamat',
        'nohp',
    ];
 
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaction(){
        return $this->hasMany(Transaksi::class, 'transaksi_costumer','kode');
    }
}
