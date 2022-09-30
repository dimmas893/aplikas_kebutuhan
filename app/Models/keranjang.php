<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $fillable = [
        'barang_id',
        'jumlah',
        'harga_satuan',
        'user_id'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
