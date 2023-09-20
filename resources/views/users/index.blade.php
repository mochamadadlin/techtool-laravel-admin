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
                <div class="col-lg-7">
                    <a href="{{ route('users.export') }}" class="btn btn-sm btn-success">
                        <i></i> Export Excel
                    </a>
                </div>
                
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
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($database_do as $data)
                                <tr>
                                    <td>{{ $data->cust_id }}</td>
                                    <td>{{ $data->bulan }}</td>
                                    <td>{{ $data->buyer}}</td>
                                    <td>{{ $data->notelp_buyer}}</td>
                                    <td>{{ $data->noktp_buyer}}</td>
                                    <td>{{ $data->tgl_lahir}}</td>
                                    <td>{{ $data->alamat}}</td>
                                    <td>{{ $data->kecamatan}}</td>
                                    <td>{{ $data->kota}}</td>
                                    <td>{{ $data->noka_1}}</td>
                                    <td>{{ $data->type}}</td>
                                    <td>{{ $data->no_polisi}}</td>
                                    <td>{{ $data->stnk_date}}</td>
                                    <td>{{ $data->type_penjualan}}</td>
                                    <td>{{ $data->sales}}</td>
                                    <td>{{ $data->spv}}</td>
                                    <td>{{ $data->tanggal_do}}</td>
                                    <td>{{ $data->last_service}}</td>
                                    <td>{{ $data->next_service}}</td>
                                    <td>{{ $data->first_service}}</td>
                                    <td>{{ $data->usia_kendaraan}}</td>
                                    <td>{{ $data->usia_service}}</td>
                                    <td>{{ $data->status_service}}</td>
                                    <!-- <td>{{ $data->status_asuransi}}</td> -->
                                    <!-- <td>{{ $data->nama_asuransi}}</td> -->
                                    <!-- <td>{{ $data->tgl_berakhirasuransi}}</td> -->
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
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
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
