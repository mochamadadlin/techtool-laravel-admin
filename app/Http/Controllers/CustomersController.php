<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
use App\Exports\CustomersExport;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/file_customers/',$nama_file);

        // import data
        $import = Excel::import(new CustomersImport, public_path('public/file_customers/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('customers.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }
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