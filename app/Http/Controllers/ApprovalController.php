<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Pengajuan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function index()
    {
        $belum_approve = Pengajuan::with('user_pengajuan')->where('user_id_approval', null)->where('user_id_pengajuan' , Auth::user()->id)->get();
        $approve = Pengajuan::with('user_pengajuan')->where('user_id_approval','!=', null)->where('user_id_pengajuan', Auth::user()->id)->get();
        return view('approval.index', compact('belum_approve', 'approve'));
    }

    public function detail($id)
    {
        $pengajuan_detail = Pengajuan_detail::with('barang')->where('pengajuan_id', $id)->get();
        $pengajuan = Pengajuan::where('id', $id)->first();
        return view('approval.detail', compact('pengajuan_detail', 'pengajuan'));
    }

    public function edit($pengajuan_detail, $pengajuan)
    {
        $pengajuan_detail = Pengajuan_detail::with('barang')->where('pengajuan_id', $pengajuan)->Find($pengajuan_detail);
        return view('approval.edit', compact('pengajuan_detail'));
    }

    public function update(Request $request)
    {



        $update = Pengajuan_detail::where('id', $request->id)->first();
        $update->jumlah_barang = $request->jumlah_barang;
        $update->save();



        $pengajuan_detail = Pengajuan_detail::where('pengajuan_id', $request->pengajuan_id)->get();
        // return response()->json([
        //     'data' => $pengajuan_detail
        // ]);
        $jsonNilai = array();
        foreach ($pengajuan_detail as $p) {
            $row =  $p->jumlah_barang * $p->harga_satuan;
            array_push($jsonNilai, $row);
        }
        // dd($jsonNilai);

        Pengajuan::where('id', $request->pengajuan_id)->update([
            'total_biaya' => array_sum($jsonNilai),
        ]);
        return back();
    }

    public function admin()
    {

        $belum_approve = Pengajuan::with('user_pengajuan')->where('user_id_approval', null)->get();
        $approve = Pengajuan::with('user_pengajuan')->where('user_id_approval', '!=', null)->get();
        return view('approval.admin_approval', compact('belum_approve', 'approve'));
    }

    public function approve_admin(Request $request)
    {
        $pengajuan = Pengajuan::where('id', $request->id)->first();
        $pengajuan->user_id_approval = 1;
        $pengajuan->update();
        return back();
    }

    public function approve_admin_detail($id)
    {
        $pengajuan_detail = Pengajuan_detail::with('barang')->where('pengajuan_id', $id)->get();
        $pengajuan = Pengajuan::where('id', $id)->first();
        return view('approval.admin_approval_detail', compact('pengajuan_detail', 'pengajuan'));
    }

    public function delete($id, Request $request)
    {
        $pengajuan_detail = Pengajuan_detail::Find($id)->delete();

        $pengajuan_detail = Pengajuan_detail::where('pengajuan_id', $request->pengajuan_id)->get();

        $jsonNilai = array();
        foreach ($pengajuan_detail as $p) {
            $row =  $p->jumlah_barang * $p->harga_satuan;
            array_push($jsonNilai, $row);
        }
        // dd($jsonNilai);

        Pengajuan::where('id', $request->pengajuan_id)->update([
            'total_biaya' => array_sum($jsonNilai),
        ]);
        return back();
    }

    public function approve_admin_edit($pengajuan_detail, $pengajuan)
    {
        $pengajuan_detail = Pengajuan_detail::with('barang')->where('pengajuan_id', $pengajuan)->Find($pengajuan_detail);
        return view('approval.admin_approval_edit', compact('pengajuan_detail'));
    }

    public function approve_admin_update(Request $request)
    {



        $update = Pengajuan_detail::where('id', $request->id)->first();
        $update->jumlah_barang = $request->jumlah_barang;
        $update->save();



        $pengajuan_detail = Pengajuan_detail::where('pengajuan_id', $request->pengajuan_id)->get();
        // return response()->json([
        //     'data' => $pengajuan_detail
        // ]);
        $jsonNilai = array();
        foreach ($pengajuan_detail as $p) {
            $row =  $p->jumlah_barang * $p->harga_satuan;
            array_push($jsonNilai, $row);
        }
        // dd($jsonNilai);

        Pengajuan::where('id', $request->pengajuan_id)->update([
            'total_biaya' => array_sum($jsonNilai),
        ]);
        return back();
    }

    public function delete_pengajuan($id)
    {
        $pengajuan = Pengajuan::Find($id)->delete();
        return back();
    }
}
