<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('cust_id');
            $table->date('bulan');
            $table->char('buyer');
            $table->integer('notelp_buyer');
            $table->integer('noktp_buyer');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->char('kecamatan');
            $table->char('kota');
            $table->integer('noka_1');
            $table->integer('type');
            $table->integer('no_polisi');
            $table->date('stnk_date');
            $table->char('type_penjualan');
            $table->char('sales');
            $table->char('spv');
            $table->date('tanggal_do');
            $table->date('last_service');
            $table->date('next_service');
            $table->date('first_service');
            $table->date('usia_kendaraan');
            $table->date('usia_service');
            $table->char('status_service');
            $table->char('status_asuransi');
            $table->char('nama_asuransi');
            $table->date('tgl_berakhirasuransi');

            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
