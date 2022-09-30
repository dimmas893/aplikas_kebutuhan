@extends('layouts.admin.template_admin')
@section('content')
    <div>
                  <div class="card card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <!-- Button trigger modal -->
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Tambah Barang
                                        </button>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <td>No</td>
                                                <td>Nama Barang</td>
                                                <td>Spesifikasi</td>
                                                <td>Harga</td>
                                                <td>Action</td>
                                            </thead>
                                            <tbody>
                                                <h1>Data Barang</h1>
                                                @foreach ($barang as $p)
                                                   <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->nama_barang }}</td>
                                                        <td>{{ $p->spesifikasi }}</td>
                                                        <td>Rp {{ number_format($p->harga_barang,2,',','.') }}</td>
                                                        <td>
                                                            <a class="btn btn-primary" href="/barang/edit/{{ $p->id }}">edit</a>
                                                            <a class="btn btn-danger" href="/barang/delete/{{ $p->id }}">delete</a>
                                                        </td>
                                                   </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/barang/store" method="post">
      <div class="modal-body">
            @csrf
            <div class="mt-2">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" placeholder="Masukan Nama Barang">
            </div>
            <div class="mt-2">
                <label>Spesifikas Barang</label>
                <input type="text" class="form-control" name="spesifikasi" placeholder="Masukan Spesifikas Barang">
            </div>
            <div class="mt-2">
                <label>Harga Barang</label>
                <input type="number" class="form-control" name="harga_barang" placeholder="masukan Harga barang">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>

    </div>
@endsection