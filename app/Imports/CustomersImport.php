<?php

namespace App\Imports;

use App\Customers;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customesr([
           "cust_id" => $row['cust_id'],
            "bulan" => $row['bulan'],
            "buyer" => $row['buyer'],
            "notelp_buyer" => $row['notelp_buyer'],
            "noktp_buyer" => $row['noktp_buyer'],
            "tgl_lahir" => $row['tgl_lahir'],
            "alamat" => $row['alamat'],
            "kecamatan" => $row['kecamatan'],
            "kota" => $row['kota'],
            "noka_1" => $row['noka_1'],
            "type" => $row['type'],
            "no_polisi" => $row['no_polisi'],
            "stnk_date" => $row['stnk_date'],
            "type_penjualan" => $row['type_penjualan'],
            "sales" => $row['sales'],
            "spv" => $row['spv'],
            "tanggal_do" => $row['tanggal_do'],
            "last_service" => $row['last_service'],
            "next_service" => $row['next_service'],
            "first_service" => $row['first_service'],
            "usia_kendaraan" => $row['usia_kendaraan'],
            "usia_service" => $row['usia_service'],
            "status_service" => $row['status_service'],
            "status_asuransi" => $row['status_asuransi'],
            "nama_asuransi" => $row['nama_asuransi'],
            "tgl_berakhirasuransi" => $row['tgl_berakhirasuransi'],
        ]);
    }
}