<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\District;
use PDF;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing-page.index');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } else {
            $request->session()->put('user', $user);
            return redirect('/home');
        }
    }
    public function home()
    {
        $distcicts = District::all();
        return view('landing-page.home', [
            'districts' => $distcicts,
        ]);
    }
    public function sanitasi()
    {
        $distcicts = District::all();
        return view('landing-page.sanitasi', [
            'districts' => $distcicts
        ]);
    }
    public function airBersih()
    {
        $distcicts = District::all();
        return view('landing-page.air-bersih', [
            'districts' => $distcicts
        ]);
    }
    public function lokasiKawasan($id)
    {
        $neighborhood = Neighborhood::where('id', $id)->first()->load('images', 'district', 'village');
        return view('landing-page.lokasi-kawasan', [
            'neighborhood' => $neighborhood
        ]);
    }
    public function import()
    {
        $districts = District::all();
        return view('landing-page.import', [
            'districts' => $districts
        ]);
    }
    public function doImport($districtId, $villageId, Request $request)
    {

        $nullFields = collect($request->all())->filter(function ($value) {
            if (is_null($value)) {
                return true;
            }
        });

        if ($nullFields) {
            return back()->with('import', 'Data gagal disimpan! semua data harus diisi!');
        }

        $houses = Neighborhood::where('district_id', $districtId)->where('village_id', $villageId)->get()
            ->each(function ($house) use ($request) {
                $house->house()->update([
                    'rail_APBD' => $request->rel_APBD,
                    'rail_APBD_prov' => $request->rel_APBD_prov,
                    'rail_APBN' => $request->rel_APBN,
                    'river_APBD' => $request->sungai_APBD,
                    'river_APBD_prov' => $request->sungai_APBD_prov,
                    'river_APBN' => $request->sungai_APBN,
                    'sutet_APBD' => $request->sutet_APBD,
                    'sutet_APBD_prov' => $request->sutet_APBD_prov,
                    'sutet_APBN' => $request->sutet_APBN,
                    'bridge_APBD' => $request->kolong_jembatan_APBD,
                    'bridge_APBD_prov' => $request->kolong_jembatan_APBD_prov,
                    'bridge_APBN' => $request->kolong_jembatan_APBN,
                    'cubluk_APBD' => $request->cubluk_APBD,
                    'cubluk_APBD_prov' => $request->cubluk_APBD_prov,
                    'cubluk_APBN' => $request->cubluk_APBN,
                    'septitank_APBD' => $request->septitank_APBD,
                    'septitank_APBD_prov' => $request->septitank_APBD_prov,
                    'septitank_APBN' => $request->septitank_APBN,
                    'ipal_APBD' => $request->ipal_APBD,
                    'ipal_APBD_prov' => $request->ipal_APBD_prov,
                    'ipal_APBN' => $request->ipal_APBN,
                ]);
            });

        if ($houses) {
            return redirect('/landing-home')->with('import', 'Data berhasil disimpan!');
        }
    }
    public function exportData($id, $fundValue)
    {
        $neighborhood = Neighborhood::where('id', $id)->first()->load('negative_list', 'house', 'water', 'sanitation');
        $map = 'PETA/administrasi/' . $neighborhood->district->name . '.jpg';

        $pdf = PDF::loadView('landing-page.export', ['neighborhood' => $neighborhood, 'map' => $map, 'fundValue' => $fundValue]);
        return $pdf->stream('data.pdf');
    }
}
