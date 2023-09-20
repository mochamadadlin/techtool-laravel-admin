@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Database Customer</h1>
            <div class="row">
                <div class="col-md-6">
                    <!-- <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"> -->
                        <!-- <i class="fas fa-plus"></i> Add New -->
                    <!-- </a> -->
                </div>
                    <a href="{{ route('users.export') }}" class="btn btn-sm btn-success">
                        <i></i> Export Excel
                    </a>
            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Database Customer</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="3">
                        <thead>
                            <tr>
                                <th width="25%">Customer ID</th>
                                <th width="25%">Bulan</th>
                                <th width="25%">Nama Pelanggan</th>
                                <th width="25%">No. Telp</th>
                                <th width="25%">No KTP</th>
                                <th width="15%">Tanggal Lahir</th>
                                <th width="25%">Alamat</th>
                                <th width="15%">Kecamatan</th>
                                <th width="15%">Kota</th>
                                <th width="15%">No Rangka</th>
                                <th width="15%">type</th>
                                <th width="15%">No Polisi</th>
                                <th width="15%">STNK</th>
                                <th width="15%">Penjualan</th>
                                <th width="15%">Sales</th>
                                <th width="15%">SPV</th>
                                <th width="15%">Tanggal DO</th>
                                <th width="15%">Usia Kendaraan</th>
                                <th width="15%">Usia Service</th>
                                <th width="15%">Status Service</th>
                                <th width="15%">Status Asuransi</th>
                                <th width="15%">Nama Asuransi</th>
                                <th width="15%">End Date Asuransi</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->cust_id }}</td>
                                    <td>{{ $user->bulan }}</td>
                                    <td>{{ $user->buyer}}</td>
                                    <td>{{ $user->notelp_buyer}}</td>
                                    <td>{{ $user->noktp_buyer}}</td>
                                    <td>{{ $user->tgl_lahir}}</td>
                                    <td>{{ $user->alamat}}</td>
                                    <td>{{ $user->kecamatan}}</td>
                                    <td>{{ $user->kota}}</td>
                                    <td>{{ $user->noka_1}}</td>
                                    <td>{{ $user->type}}</td>
                                    <td>{{ $user->no_polisi}}</td>
                                    <td>{{ $user->stnk_date}}</td>
                                    <td>{{ $user->type_penjualan}}</td>
                                    <td>{{ $user->sales}}</td>
                                    <td>{{ $user->spv}}</td>
                                    <td>{{ $user->tanggal_do}}</td>
                                    <td>{{ $user->usia_kendaraan}}</td>
                                    <td>{{ $user->usia_service}}</td>
                                    <td>{{ $user->status_service}}</td>
                                    <td>{{ $user->status_asuransi}}</td>
                                    <td>{{ $user->nama_asuransi}}</td>
                                    <td>{{ $user->tgl_berakhirasuransi}}</td>
                                    <td>
                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                        class="btn btn-primary m-2">
                                         <i class="fa fa-pen"></i>
                                    </a>
                                     <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fas fa-trash"></i>
                                     </a>
                                    </td>
                                    
                                    <!-- <td>{{ $user->roles ? $user->roles->pluck('name')->first() : 'N/A' }}</td> -->

                                    <!-- <td> -->
                                        <!-- @if ($user->status == 0) -->
                                            <!-- <span class="badge badge-danger">Inactive</span> -->
                                        <!-- @elseif ($user->status == 1) -->
                                            <!-- <span class="badge badge-success">Active</span> -->
                                        <!-- @endif -->
                                    <!-- </td> -->
                                    <!-- <td style="display: flex"> -->
                                        <!-- @if ($user->status == 0) -->
                                            <!-- <a href="{{ route('users.status', ['user_id' => $user->id, 'status' => 1]) }}" -->
                                                <!-- class="btn btn-success m-2"> -->
                                                <!-- <i class="fa fa-check"></i> -->
                                            <!-- </a> -->
                                        <!-- @elseif ($user->status == 1) -->
                                            <!-- <a href="{{ route('users.status', ['user_id' => $user->id, 'status' => 0]) }}" -->
                                                <!-- class="btn btn-danger m-2"> -->
                                                <!-- <i class="fa fa-ban"></i> -->
                                            <!-- </a> -->
                                        <!-- @endif -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>

    @include('users.delete-modal')

@endsection

@section('scripts')
    
@endsection
