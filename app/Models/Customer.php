<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
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
}