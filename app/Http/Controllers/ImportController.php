<?php

namespace App\Http\Controllers;

use App\Models\Neighborhood;
use Illuminate\Http\Request;
use App\Imports\NeighborhoodImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function importExcel()
    {
        return view('import.importExcel');
    }
    public function doImportNeighborhood(Request $request)
    {
        Excel::import(new NeighborhoodImport($request->file('neighborhood')), $request->file('neighborhood'));
        return back()->with('import', 'Data Neighborhood berhasil disimpan!');
    }
    public function importManualBook()
    {
        return view('import.importManualBook');
    }
    public function doImportManualBook(Request $request)
    {
        try {
            if ($request->hasFile('manual_book')) {
                if ($request->file('manual_book')->getClientOriginalExtension() == 'pdf') {
                    $filename = 'manual_book' . '.' . $request->file('manual_book')->getClientOriginalExtension();
                    $destinationPath = 'public/MANUAL BOOK/' . $filename;
                    if (Storage::exists($destinationPath)) {
                        Storage::delete($destinationPath);
                    }
                    Storage::put($destinationPath, file_get_contents($request->file('manual_book')->getRealPath()));
                    return back()->with('success', 'Manual book berhasil disimpan!');
                } else {
                    return back()->with('error', 'Format file harus PDF!');
                }
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Manual book gagal disimpan!');
        }
    }
    public function getManualBook()
    {
        if (Storage::exists('/public/MANUAL BOOK/manual_book.pdf')) {
            return Storage::disk('public')->download('MANUAL BOOK/manual_book.pdf');
        } else {
            return back()->with('error', 'File belum diupload.');
        }
    }
    public function getFileXHP($neighborhoodId)
    {
        $neighborhood = Neighborhood::with('village')->where('id', $neighborhoodId)->first();
        if (!$neighborhood->village) {
            return back()->with('error', 'Data desa tidak ditemukan untuk kecamatan ini.');
        }
        $villageName = $neighborhood->village->name;
        $path = '/public/PETA/xhp/' . $villageName . '.xhp';
        if (Storage::exists($path)) {
            return Storage::disk('public')->download('PETA/xhp/' . $villageName . '.xhp');
        } else {
            return back()->with('error', 'File belum diupload.');
        }
    }
}
