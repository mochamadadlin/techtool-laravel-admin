<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Customers extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'cust_id', 
        'bulan',
        'buyer',
        'notelp_buyer', 
        'noktp_buyer',
        'tgl_lahir',
        'alamat',
        'kecamatan',
        'kota',
        'noka_1',
        'type',
        'no_polisi',
        'stnk_date',
        'type_penjualan',
        'sales',
        'spv',
        'tanggal_do',
        'last_service',
        'next_service',
        'first_service' ,
        'usia_kendaraan' ,
        'usia_service' ,
        'status_service' ,
        'status_asuransi' ,
        'nama_asuransi' ,
        'tgl_berakhirasuransi' , ];

        protected $casts = [
        'bulan'                => 'date:Y-m-d',
        'tgl_lahir'            => 'date:Y-m-d',
        'stnk_date'            => 'datetime:Y-m-d',
        'last_service'         => 'datetime:Y-m-d',
        'next_service'         => 'datetime:Y-m-d',
        'first_service'        => 'datetime:Y-m-d',
        'tgl_berakhirasuransi' => 'datetime:Y-m-d',
        ];}