@extends('layouts.admin.template_admin')
@section('content')
    <div class="card">
        <div class="card-header">Edit Barang</div>
        <div class="card-body">
            <form action="/barang/update/{{ $barang->id }}" method="post">
                @csrf
                  <div class="mt-2">
                <label>nama barang</label>
                <input type="text" class="form-control" name="nama_barang" placeholder="{{ $barang->nama_barang }}"/>
            </div>
            <div class="mt-2">
                <label>spesifikasi barang</label>
                <input type="text" class="form-control" name="spesifikasi" placeholder="{{ $barang->spesifikasi }}"/>
            </div>
            <div class="mt-2">
                <label>harga barang</label>
                <input type="text" class="form-control" name="harga"placeholder="{{ $barang->harga }}"/>
            </div>
            <div class="mt-2">
                <input type="submit" class="btn btn-primary" value="save">
            </div>
            </form>
        </div>
    </div>
@endsection