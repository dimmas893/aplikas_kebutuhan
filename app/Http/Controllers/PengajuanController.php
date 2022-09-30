<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\Pengajuan;
use App\Models\Pengajuan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function store(Request $request)
    {


        $keranjang = keranjang::where('user_id', Auth::user()->id)->get();

        // foreach($keranjang as $p){
            $create = [
                'tanggal' => $request->tanggal,
                'user_id_pengajuan' => Auth::user()->id,
                'total_biaya' => $request->total_biaya,
            ];

            $pengajuan = Pengajuan::create($create);

            $detail = [
                'pengajuan_id' => $pengajuan->id,
                'barang_id' => $request->barang_id,
                'jumlah_barang' => $request->jumlah_barang,
                'harga_satuan' => $request->harga_satuan,
            ];

            Pengajuan_detail::create($detail);

        // }

       return back();
    }
}
