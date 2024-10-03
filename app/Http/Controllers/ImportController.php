<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function importExcel(){
        return view('import.importExcel');
    }
    public function doImportNeighborhood(Request $request){
        
    }
    public function doImportVillage(Request $request){
        
    }
    public function doImportDistrict(Request $request){
        
    }
    public function doImportCity(Request $request){
        
    }
}
