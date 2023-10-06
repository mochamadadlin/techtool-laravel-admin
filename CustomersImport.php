<?php

namespace App\Imports;

use App\Models\Customers;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class CustomersImport implements ToModel, WithHeadingRow,WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customers([
           "cust_id" => $row,
            "bulan" => $row,
            "buyer" => $row,
            "notelp_buyer" => $row,
            "noktp_buyer" => $row,
            "tgl_lahir" => $row,
            "alamat" => $row,
            "kecamatan" => $row,
            "kota" => $row,
            "noka_1" => $row,
            "type" => $row,
            "no_polisi" => $row,
            "stnk_date" => $row,
            "type_penjualan" => $row,
            "sales" => $row,
            "spv" => $row,
            "tanggal_do" => $row,
            "last_service" => $row,
            "next_service" => $row,
            "first_service" => $row,
            "usia_kendaraan" => $row,
            "usia_service" => $row,
            "status_service" => $row,
            "status_asuransi" => $row,
            "nama_asuransi" => $row,
            "tgl_berakhirasuransi" => $row,
        ]);

        
    }
}