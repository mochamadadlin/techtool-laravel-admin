<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Customer</title>
</head>
<body>

<div class="container" style="margin-top: 80px">
    <div class="row">
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
            <div class="card">
                <div class="card-header">
                    Data Customer
                </div>
                <div class="card-body">
                    <div class="button-action" style="margin-bottom: 20px">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
                            IMPORT
                        </button>
                        <a href="" class="btn btn-primary btn-md">EXPORT</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                            <tr>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Cabang</th>
                                <th scope="col">Jumlah Kendaraan</th>
                                <th scope="col">Usia Service</th>

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
            <form action="{{ route('customers.import') }}" method="POST" enctype="multipart/form-data">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>
</body>
</html>