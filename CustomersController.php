<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
use App\Exports\CustomersExport;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as fdate;
use Illuminate\Support\Carbon;


class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::get();
        return view('customers', compact('customers'));
    }

    public function import(Request $request)
    {

        $this->validate($request, [
            'file_customers' => 'required|file|mimes:xls,xlsx'
        ]);
        $the_file = $request->file('file_customers');

        // $bulan = \Carbon\Carbon::parse('d-m-y')->toDateTimeString();


        // $bulan = Carbon::createFromFormat('d-m-Y', $request->bulan)->timestamp;
        // $bulan = Carbon::createFromFormat('d-m-Y', $request->bulan)->timestamp;
        // $bulan = Carbon::createFromFormat('d-m-Y', $request->bulan)->timestamp;
        // $bulan = Carbon::createFromFormat('d-m-Y', $request->bulan)->timestamp;
        // $bulan = Carbon::createFromFormat('d-m-Y', $request->bulan)->timestamp;
        // $bulan = Carbon::createFromFormat('d-m-Y', $request->bulan)->timestamp;
        // $bulan = Carbon::createFromFormat('d-m-Y', $request->bulan)->timestamp;
        // $bulan = Carbon::createFromFormat('d-m-Y', $request->bulan)->timestamp;

	 try{
	$spreadsheet  = IOFactory::load($the_file->getRealPath());
    $sheet        = $spreadsheet->getActiveSheet();
    $row_limit    = $sheet->getHighestDataRow();
    $column_limit = $sheet->getHighestDataColumn();
    $row_range    = range( 2, $row_limit );
	$column_range = range( 'Z', $column_limit );
    $startcount   = 2;
    $data         = array();

	foreach ($row_range as $row) {
        $data[] = [
            'cust_id'               => $sheet->getCell( 'A' . $row )->getValue(),
            'bulan'                 => $sheet->getCell( 'B' . $row )->getValue(),
            'buyer'                 => $sheet->getCell( 'C' . $row )->getValue(),
            'notelp_buyer'          => $sheet->getCell( 'D' . $row )->getValue(),
            'noktp_buyer'           => $sheet->getCell( 'E' . $row )->getValue(),
            'tgl_lahir'             => $sheet->getCell( 'F' . $row )->getValue(),
            'alamat'                => $sheet->getCell( 'G' . $row )->getValue(),
            'kecamatan'             => $sheet->getCell( 'H' . $row )->getValue(),
            'kota'                  => $sheet->getCell( 'I' . $row )->getValue(),
            'noka_1'                => $sheet->getCell( 'J' . $row )->getValue(),
            'type'                  => $sheet->getCell( 'K' . $row )->getValue(),
            'no_polisi'             => $sheet->getCell( 'L' . $row )->getValue(),
            'stnk_date'             => $sheet->getCell( 'M' . $row )->getValue(),
            'type_penjualan'        => $sheet->getCell( 'N' . $row )->getValue(),
            'sales'                 => $sheet->getCell( 'O' . $row )->getValue(),
            'spv'                   => $sheet->getCell( 'P' . $row )->getValue(),
            'tanggal_do'            => $sheet->getCell( 'Q' . $row )->getValue(),
            'last_service'          => $sheet->getCell( 'R' . $row )->getValue(),
            'next_service'          => $sheet->getCell( 'S' . $row )->getValue(),
            'first_service'         => $sheet->getCell( 'T' . $row )->getValue(),
            'usia_kendaraan'        => $sheet->getCell( 'U' . $row )->getValue(),
            'usia_service'          => $sheet->getCell( 'V' . $row )->getValue(),
            'status_service'        => $sheet->getCell( 'W' . $row )->getValue(),
            'status_asuransi'       => $sheet->getCell( 'X' . $row )->getValue(),
            'nama_asuransi'         => $sheet->getCell( 'Y' . $row )->getValue(),
            'tgl_berakhirasuransi'  => $sheet->getCell( 'Z' . $row )->getValue(),

        ];
        
        $startcount++;
    }

    DB::table('customers')->insert($data);
    } catch (Exception $e) {
    // $error_code = $e->errorInfo[1];
    return back()->withErrors('There was a problem uploading the data!');
    }
    return back()->withSuccess('Great! Data has been successfully uploaded.');
    }


     function export() 
    {
        return Excel::download(new CustomersExport, 'Format data user.xlsx');
    }

     function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table customers sesuai pencarian data
		$customers = DB::table('customers')
		->where('cust_id','buyer','no_polisi','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data customers ke view 
		return view('customers',['customers' => $customers]);
 
	}
}