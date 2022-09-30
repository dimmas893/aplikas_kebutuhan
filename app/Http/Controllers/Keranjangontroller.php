<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\keranjang;
use App\Models\Pengajuan;
use App\Models\Pengajuan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Keranjangontroller extends Controller
{
    public function index()
    {
        $keranjang = keranjang::where('user_id', Auth::user()->id)->get();
        $barang = Barang::all();
        return view('keranjang.index', compact('keranjang', 'barang'));
    }

    public function store(Request $request)
    {
        $databarang = Barang::where('id', $request->barang_id)->first();
        $create = [
            'barang_id' => $databarang->id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $databarang->harga_barang,
            'user_id' => Auth::user()->id 
        ];

        Keranjang::create($create);
        return back();
    }

    public function detail()
    {
        $keranjang = keranjang::with('barang')->where('user_id', Auth::user()->id)->get();
        return view('keranjang.detail' , compact('keranjang'));
    }

    public function storePengajuan(Request $request)
    {

    // foreach($keranjang as $p){
        $create = [
            'tanggal' => \Carbon\Carbon::now()->format('Y-m-d'),
            'user_id_pengajuan' => Auth::user()->id,
        ];

        $pengajuan = Pengajuan::create($create);

        $keranjang = keranjang::where('user_id', Auth::user()->id)->get();
        
        
        $jsonNilai = array();
        foreach ($keranjang as $p) {
            $row =  $p->harga_satuan * $p->jumlah;
            array_push($jsonNilai, $row);
            $detail = [
                'pengajuan_id' => $pengajuan->id,
                'barang_id' => $p->barang_id,
                'jumlah_barang' => $p->jumlah,
                'harga_satuan' => $p->harga_satuan,
            ];

            Pengajuan_detail::create($detail);
        }

        Pengajuan::where('id', $pengajuan->id)->update([
            'total_biaya' => array_sum($jsonNilai),
        ]);

        foreach ($keranjang as $p) {
            keranjang::Find($p->id)->delete();
        }

        return back();
    }

    public function delete($id)
    {
        $keranjang = keranjang::Find($id)->delete();
        return back();
    }
}
