<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\VillageImport;
use App\Imports\DistrictImport;
use App\Imports\NeighborhoodImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importExcel(){
        return view('import.importExcel');
    }
    public function doImportNeighborhood(Request $request){
        Excel::import(new NeighborhoodImport, $request->file('neighborhood'));
        return back()->with('import', 'Data Neighborhood berhasil disimpan!');
    }
}
