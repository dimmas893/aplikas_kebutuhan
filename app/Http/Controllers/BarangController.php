<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function store(Request $request)
    {
        $create = [
            'nama_barang' => $request->nama_barang,
            'spesifikasi' => $request->spesifikasi,
            'harga' => $request->harga,
        ];

        Barang::create($create);
        return back();
    }

    public function edit($id)
    {
        $barang = Barang::Find($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $update = Barang::Find($id);
        $update->nama_barang = $request->nama_barang;
        $update->spesifikasi = $request->spesifikasi;
        $update->harga_barang = $request->harga_barang;
        $update->save();

        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function delete($id)
    {
        $barang = Barang::Find($id)->delete();
        return back();
    }
}
