@extends('layouts.admin.template_admin')
@section('content')
      <!-- Earnings (Monthly) Card Example -->
      @php 
        $approve = \App\Models\Pengajuan::where('user_id_approval', '!=', null)->get();
        $all = \App\Models\Pengajuan::all();
        $belum_approve = \App\Models\Pengajuan::where('user_id_approval', null)->get();
        $barang = \App\Models\Barang::all();
      @endphp
    <div class="row">
         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Pengajuan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $all->count() }}</div>
                                        </div>
                                        <div class="col-auto">  
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Approve</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $approve->count() }}</div>
                                        </div>
                                        <div class="col-auto">  
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Menunggu Approve</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belum_approve->count() }}</div>
                                        </div>
                                        <div class="col-auto">  
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                           <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barang->count() }}</div>
                                        </div>
                                        <div class="col-auto">  
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
@endsection