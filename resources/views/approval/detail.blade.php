@extends('layouts.admin.template_admin')
@section('content')


@php
$admin = \App\Models\User::where('id', Auth::user()->id)->where('role', 'admin')->first();
$user = \App\Models\User::where('id', Auth::user()->id)->where('role', null)->first();  
@endphp

@if ($user)
       <div class="row">
        <div class="col-12">
            <div class="card card-body">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <!-- Button trigger modal -->
                                    <div class="text-right">
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                {{-- <td>No</td> --}}
                                                <td>No</td>
                                                <td>Nama Barang</td>
                                                <td>Spesifikasi</td>
                                                <td>Harga</td>
                                                <td>Jumlah Barang</td>
                                                <td>Action</td>
                                            </thead>
                                            <tbody>
                                               <div class="row text-right mb-4">
                                                    <div class="col-12">
                                                        <a href="/approval" class="btn btn-primary">Back</a>
                                                    </div>
                                                    
                                                </div>
                                                <div><span><h4>Data Pengajuan Barang</h4></span></div>
                                                    
                                       
                                                @foreach ($pengajuan_detail as $p)
                                                   <tr>
                                                        {{-- <td>{{ $itteration }}</td> --}}
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->barang->nama_barang }}</td>
                                                        <td>{{ $p->barang->spesifikasi }}</td>
                                                        <td>Rp {{ number_format($p->barang->harga_barang,2,',','.') }}</td>
                                                        <td>{{ $p->jumlah_barang }}</td>
                                                        <td>

                                                        @if($p->pengajuan->user_id_approval == null)
                                                                 <a class="btn btn-primary" href="/approval/edit/{{ $p->id }}/{{ $p->pengajuan_id }}">edit</a>
                                                            {{-- <a class="btn btn-danger" href="/pengajuan_detail/delete/{{ $p->id }}">delete</a> --}}
                                                                <form action="/pengajuan_detail/delete/{{ $p->id }}" method="get">
                                                                    @csrf
                                                                    <input type="hidden" name="pengajuan_id" value="{{ $p->pengajuan_id }}">
                                                                    <input type="submit" class="btn btn-danger" value="delete">

                                                                </form>
                                                            @endif
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
            {{-- <div class="col-3">
                <div class="card">
                    <div class="card-header">Tombol Approve</div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p>total biaya : Rp {{ number_format($->barang->harga_barang,2,',','.') }}</p>
                            <form action="/simpan-pengajuan" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-primary mb-5 text-center" value="Approve">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>
@endif
@endsection