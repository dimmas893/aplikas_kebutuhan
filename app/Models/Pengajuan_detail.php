<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan_detail extends Model
{
    use HasFactory;
    protected $table = 'detail_pengajuan';
    protected $fillable = [
        'pengajuan_id',
        'barang_id',
        'jumlah_barang',
        'harga_satuan'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'id');
    }
}
