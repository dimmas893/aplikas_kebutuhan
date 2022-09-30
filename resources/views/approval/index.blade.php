@extends('layouts.admin.template_admin')
@section('content')

@php
$admin = \App\Models\User::where('id', Auth::user()->id)->where('role', 'admin')->first();
$user = \App\Models\User::where('id', Auth::user()->id)->where('role', null)->first();  
@endphp

@if ($user)

<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link" href="#approve" role="tab" data-toggle="tab">Approve</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#belumapprove" role="tab" data-toggle="tab">Belum Approve</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in" id="approve">
         <div class="row">
            <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <td>No</td>
                                                <td>Nama Pengajuan</td>
                                                <td>Tanggal Pengajuan</td>
                                                <td>Total Biaya</td>
                                                <td>Approval</td>
                                                <td>Action</td>
                                            </thead>
                                            <tbody>
                                                <div>
                                                    <span><h4>Tabel Pengajuan</h4></span>
                                                </div>
                                       
                                                @foreach($approve as $p)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->user_pengajuan->name }}</td>
                                                        <td>{{ $p->tanggal }}</td>
                                                        <td>Rp {{ number_format($p->total_biaya,2,',','.') }}</td>
                                                        <td>
                                                              @if($p->user_id_approval)
                                                                <p style="color:chartreuse">Approve</p>
                                                            @endif
                                                            @if($p->user_id_approval == null)
                                                                <p style="color:red">Masih di periksa</p>
                                                            @endif
                                                        </td>
                                                        <td><a href="/approval/detail/{{ $p->id }}" class="btn btn-success">Lihat</a></td>
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
  <div role="tabpanel" class="tab-pane fade" id="belumapprove">
         <div class="row">
            <div class="col-12">
                            <div class="card mt-2">
                                <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <td>No</td>
                                                <td>Nama Pengajuan</td>
                                                <td>Tanggal Pengajuan</td>
                                                <td>Total Biaya</td>
                                                <td>Approval</td>
                                                <td>Action</td>
                                            </thead>
                                            <tbody>
                                                <div>
                                                    <span><h1>Tabel Pengajuan</h1></span>
                                                </div>
                                       
                                                @foreach($belum_approve as $p)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->user_pengajuan->name }}</td>
                                                        <td>{{ $p->tanggal }}</td>
                                                        <td>Rp {{ number_format($p->total_biaya,2,',','.') }}</td>
                                                        <td>
                                                              @if($p->user_id_approval)
                                                                <p style="color:chartreuse">Approve</p>
                                                            @endif
                                                            @if($p->user_id_approval == null)
                                                                <p style="color:red">Masih di periksa</p>
                                                            @endif
                                                        </td>
                                                        <td><a href="/approval/detail/{{ $p->id }}" class="btn btn-success">Lihat</a></td>
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
</div>

@endif
@endsection