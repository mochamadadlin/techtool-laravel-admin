@extends('layouts.app')
@section('title', 'Customers List')
@section('content')

        <div class="col-md-12">
            @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @elseif($message =  Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Customers</h1>
            <div class="row">
        <div class="button-action" style="margin-bottom: 20px">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
                IMPORT
            </button>
            <a href="/customers/export" class="btn btn-primary btn-md">EXPORT</a>
        </div>
        <div class="col-auto">
       <form action="/customers/cari" method="GET">
           <input type="text" placeholder="Search" name="cari" class="form-control" value="{{ old('cari') }}"
               aria-describedby="passwordHelpInline">
       </form>
   </div>
                
        </div>

    </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Customers</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Cabang</th>
                                <th scope="col">Jumlah Kendaraan</th>
                                <th scope="col">Usia Kendaraan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                                <tr>
                                <td>{{ $customer->cust_id }}</td>
                                <td>{{ $customer->bulan }}</td>
                                <td>{{ $customer->buyer }}</td>
                                <td>{{ $customer->notelp_buyer }}</td>
                                <td>{{ $customer->noktp_buyer }}</td>
                                <td>{{ $customer->tgl_lahir }}</td>
                                <td>{{ $customer->alamat }}</td>
                                <td>{{ $customer->kecamatan }}</td>
                                <td>{{ $customer->kota }}</td>
                                <td>{{ $customer->noka_1 }}</td>
                                <td>{{ $customer->type }}</td>
                                <td>{{ $customer->no_polisi }}</td>
                                <td>{{ $customer->stnk_date}}</td>
                                <td>{{ $customer->type_penjualan }}</td>
                                <td>{{ $customer->sales }}</td>
                                <td>{{ $customer->spv }}</td>
                                <td>{{ $customer->tanggal_do }}</td>
                                <td>{{ $customer->last_service }}</td>
                                <td>{{ $customer->next_service }}</td>
                                <td>{{ $customer->first_service }}</td>
                                <td>{{ $customer->usia_kendaraan }}</td>
                                <td>{{ $customer->usia_service }}</td>
                                <td>{{ $customer->status_service }}</td>
                                <td>{{ $customer->status_asuransi }}</td>
                                <td>{{ $customer->nama_asuransi }}</td>
                                <td>{{ $customer->tgl_berakhirasuransi }}</td>
                                <td>
                                <div class="hidden-print"> </div> 
                                    <a href="#"  data-toggle="modal" class='open_detail'>
                                        <div align='center'>Lihat Detail
                                    </a>
                                        </div>
                                </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- modal -->
    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('customers.import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    
@endsection
