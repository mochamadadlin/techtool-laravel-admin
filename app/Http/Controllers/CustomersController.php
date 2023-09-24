<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
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
        $path = $file->storeAs('public/files/',$nama_file);

        // import data
        $import = Excel::import(new CustomerImport(), storage_path('public/files/'.$nama_file));

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