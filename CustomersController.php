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
use PhpOffice\PhpSpreadsheet\Shared\Date as date;
use Illuminate\Support\Carbon;
// use PhpOffice\PhpSpreadsheet\Style\NumberFormat;



class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $customers = Customers::get();
        $customers = DB::table('customers')->paginate(10);
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
        ini_set('memory_limit', '4000M');
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 2, $row_limit );
            $column_range = range( 'Z', $column_limit );
            $startcount = 2;
            $data = array();
            
        foreach ($row_range as $row) {
        $data[] = [
            'cust_id'               => $sheet->getCell( 'A' . $row )->getValue(),
            'bulan'                 => date("Y-m-d"),
            'buyer'                 => $sheet->getCell( 'C' . $row )->getValue(),
            'notelp_buyer'          => $sheet->getCell( 'D' . $row )->getValue(),
            'noktp_buyer'           => $sheet->getCell( 'E' . $row )->getValue(),
            'tgl_lahir'             => date("Y-m-d"),
            'alamat'                => $sheet->getCell( 'G' . $row )->getValue(),
            'kecamatan'             => $sheet->getCell( 'H' . $row )->getValue(),
            'kota'                  => $sheet->getCell( 'I' . $row )->getValue(),
            'noka_1'                => $sheet->getCell( 'J' . $row )->getValue(),
            'type'                  => $sheet->getCell( 'K' . $row )->getValue(),
            'no_polisi'             => $sheet->getCell( 'L' . $row )->getValue(),
            'stnk_date'             => date("Y-m-d"),
            'type_penjualan'        => $sheet->getCell( 'N' . $row )->getValue(),
            'sales'                 => $sheet->getCell( 'O' . $row )->getValue(),
            'spv'                   => $sheet->getCell( 'P' . $row )->getValue(),
            'tanggal_do'            => date("Y-m-d"),
            'last_service'          => date("Y-m-d"),
            'next_service'          => date("Y-m-d"),
            'first_service'         => date("Y-m-d"),
            'usia_kendaraan'        => $sheet->getCell( 'U' . $row )->getValue(),
            'usia_service'          => $sheet->getCell( 'V' . $row )->getValue(),
            'status_service'        => $sheet->getCell( 'W' . $row )->getValue(),
            'status_asuransi'       => $sheet->getCell( 'X' . $row )->getValue(),
            'nama_asuransi'         => $sheet->getCell( 'Y' . $row )->getValue(),
            'tgl_berakhirasuransi'  => date("Y-m-d"),

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
public function ExportExcel($customer_data){
    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '4000M');
    try {
        $spreadSheet = new Spreadsheet();
        $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
        $spreadSheet->getActiveSheet()->fromArray($customer_data);
        $Excel_writer = new Xls($spreadSheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Customers Data.xls"');
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $Excel_writer->save('php://output');
        exit();
    } catch (Exception $e) {
        return;
    }
}
        function exportData(){
        $data = DB::table('customers')->orderBy('cust_id', 'DESC')->get();
        $data_array [] = array( 
        'cust_id',              
        'bulan',               
        'buyer',                
        'notelp_buyer',        
        'noktp_buyer',          
        'tgl_lahir',            
        'alamat',               
        'kecamatan' ,           
        'kota',                 
        'noka_1',               
        'type' ,                
        'no_polisi',            
        'stnk_date' ,           
        'type_penjualan' ,      
        'sales'  ,              
        'spv' ,                 
        'tanggal_do' ,          
        'last_service' ,        
        'next_service' ,        
        'first_service' ,       
        'usia_kendaraan' ,      
        'usia_service' ,        
        'status_service' ,      
        'status_asuransi' ,     
        'nama_asuransi'  ,      
        'tgl_berakhirasuransi', );

        foreach($data as $data_item)
        { $data_array[] = array(
        'cust_id'                               =>$data_item->cust_id,    
        'bulan'                                 =>$data_item->bulan,               
        'buyer'                                 =>$data_item->buyer,             
        'notelp_buyer'                          =>$data_item->notelp_buyer,      
        'noktp_buyer'                           =>$data_item->noktp_buyer,      
        'tgl_lahir'                             =>$data_item->tgl_lahir,       
        'alamat'                                =>$data_item->alamat,        
        'kecamatan'                             =>$data_item->kecamatan,       
        'kota'                                  =>$data_item->kota,       
        'noka_1'                                =>$data_item->noka_1,      
        'type'                                  =>$data_item->type,     
        'no_polisi'                             =>$data_item->no_polisi,    
        'stnk_date'                             =>$data_item->stnk_date,  
        'type_penjualan'                        =>$data_item->type_penjualan,  
        'sales'                                 =>$data_item->sales,
        'spv'                                   =>$data_item->spv,
        'tanggal_do'                            =>$data_item->tanggal_do,
        'last_service'                          =>$data_item->last_service,
        'next_service'                          =>$data_item->next_service,
        'first_service'                         =>$data_item->first_service,
        'usia_kendaraan'                        =>$data_item->usia_kendaraan,
        'usia_service'                          =>$data_item->usia_service,
        'status_service'                        =>$data_item->status_service,
        'status_asuransi'                       =>$data_item->status_asuransi,
        'nama_asuransi'                         =>$data_item->nama_asuransi,
        'tgl_berakhirasuransi'                  =>$data_item->tgl_berakhirasuransi,);
        }
        $this->ExportExcel($data_array);
    }
 }
 
    function keyword(Request $request)
	{
        $keyword = $request->keyword;
        $customers = Customers::where('buyer','like',"%".$keyword."%")
        ->orWhere('cust_id','like',"%".$keyword."%")
        ->orWhere('type_penjualan','like',"%".$keyword."%")
        ->get();
    		// mengirim data customers ke view 
            return view('customers', compact('customers'));
    }


