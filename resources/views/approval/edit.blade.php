@extends('layouts.admin.template_admin')
@section('content')


@php
$admin = \App\Models\User::where('id', Auth::user()->id)->where('role', 'admin')->first();
$user = \App\Models\User::where('id', Auth::user()->id)->where('role', null)->first();  
@endphp


@if ($user)
    <div class="card text-center">
        <div class="card-header">Edit Barang Pengajuan</div>
        <div class="card-body">
            <form action="/approval/update">
                <input type="hidden" name="pengajuan_id" value="{{ $pengajuan_detail->pengajuan_id }}">
                <input type="hidden" name="id" value="{{ $pengajuan_detail->id }}">
                <p>Nama Barang : <br>{{ $pengajuan_detail->barang->nama_barang }}</p>
                <p>Spesifikasi Barang : <br>{{ $pengajuan_detail->barang->spesifikasi }}</p>
                {{-- <p>{{ $pengajuan_detail->jumlah_barang }}</p> --}}
                <p><input type="number" name="jumlah_barang" placeholder="{{ $pengajuan_detail->jumlah_barang }}"></p>
                <input type="submit" class="btn btn-success" value="save" />
                 <td><a href="/approval/detail/{{ $pengajuan_detail->pengajuan_id }}" class="btn btn-primary">back</a></td>
            </form>
        </div>
    </div>
@endif

@endsection