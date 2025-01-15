<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Total;
use App\Models\Funding;
use App\Models\District;
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
        return view(view: 'landing-page.import', data: [
            'districts' => $districts
        ]);
    }
    public function doImport($neighborhoodId, $villageId, Request $request)
    {
        $railFunding = Funding::where('neighborhood_id', $neighborhoodId)->where('year', $request->input('rail')['year'])->where('source', $request->input('rail')['source'])->where('type', 'rail')->first();
        $riverFunding = Funding::where('neighborhood_id', $neighborhoodId)->where('year', $request->input('river')['year'])->where('source', $request->input('river')['source'])->where('type', 'river')->first();
        $sutetFunding = Funding::where('neighborhood_id', $neighborhoodId)->where('year', $request->input('sutet')['year'])->where('source', $request->input('sutet')['source'])->where('type', 'sutet')->first();
        $bridgeFunding = Funding::where('neighborhood_id', $neighborhoodId)->where('year', $request->input('bridge')['year'])->where('source', $request->input('bridge')['source'])->where('type', 'bridge')->first();
        $septicTankFunding = Funding::where('neighborhood_id', $neighborhoodId)->where('year', $request->input('septicTank')['year'])->where('source', $request->input('septicTank')['source'])->where('type', 'septic_tank')->first();
        $ipalFunding = Funding::where('neighborhood_id', $neighborhoodId)->where('year', $request->input('ipal')['year'])->where('source', $request->input('ipal')['source'])->where('type', 'ipal')->first();
        $latrineFunding = Funding::where('neighborhood_id', $neighborhoodId)->where('year', $request->input('latrine')['year'])->where('source', $request->input('river')['source'])->where('type', 'latrine')->first();

        $total = Total::where('village_id', $villageId)->first();
        if ($railFunding != null) {
            $railFunding->update([
                'volume' => $request->input('rail')['volume'],
                'achieve' => $request->input('rail')['achieve'],
                'nominal' => $request->input('rail')['nominal']
            ]);
            $achieve = $request->input('rail')['achieve'] ?? $request->input('rail')['firstCon'];
            $total->update([
                'value_rail' => $achieve
            ]);
        } else {
            Funding::create([
                'neighborhood_id' => $neighborhoodId,
                'year' => $request->input('rail')['year'],
                'source' => $request->input('rail')['source'],
                'type' => 'rail',
                'volume' => $request->input('rail')['volume'],
                'achieve' => $request->input('rail')['achieve'],
                'nominal' => $request->input('rail')['nominal']
            ]);
            $achieve = $request->input('rail')['achieve'] ?? $request->input('rail')['firstCon'];
            $total->update([
                'value_rail' => $achieve
            ]);
        }
        if ($riverFunding != null) {
            $riverFunding->update([
                'volume' => $request->input('river')['volume'],
                'achieve' => $request->input('river')['achieve'],
                'nominal' => $request->input('river')['nominal']
            ]);
            $achieve = $request->input('river')['achieve'] ?? $request->input('river')['firstCon'];
            $total->update([
                'value_river' => $achieve
            ]);
        } else {
            Funding::create([
                'neighborhood_id' => $neighborhoodId,
                'year' => $request->input('river')['year'],
                'source' => $request->input('river')['source'],
                'type' => 'river',
                'volume' => $request->input('river')['volume'],
                'achieve' => $request->input('river')['achieve'],
                'nominal' => $request->input('river')['nominal']
            ]);
            $achieve = $request->input('river')['achieve'] ?? $request->input('river')['firstCon'];
            $total->update([
                'value_river' => $achieve
            ]);
        }
        if ($sutetFunding != null) {
            $sutetFunding->update([
                'volume' => $request->input('sutet')['volume'],
                'achieve' => $request->input('sutet')['achieve'],
                'nominal' => $request->input('sutet')['nominal']
            ]);
            $achieve = $request->input('sutet')['achieve'] ?? $request->input('sutet')['firstCon'];
            $total->update([
                'value_sutet' => $achieve
            ]);
        } else {
            Funding::create([
                'neighborhood_id' => $neighborhoodId,
                'year' => $request->input('sutet')['year'],
                'source' => $request->input('sutet')['source'],
                'type' => 'sutet',
                'volume' => $request->input('sutet')['volume'],
                'achieve' => $request->input('sutet')['achieve'],
                'nominal' => $request->input('sutet')['nominal']
            ]);
            $achieve = $request->input('sutet')['achieve'] ?? $request->input('sutet')['firstCon'];
            $total->update([
                'value_sutet' => $achieve
            ]);
        }
        if ($bridgeFunding != null) {
            $bridgeFunding->update([
                'volume' => $request->input('bridge')['volume'],
                'achieve' => $request->input('bridge')['achieve'],
                'nominal' => $request->input('bridge')['nominal']
            ]);
            $achieve = $request->input('bridge')['achieve'] ?? $request->input('bridge')['firstCon'];
            $total->update([
                'value_bridge' => $achieve
            ]);
        } else {
            Funding::create([
                'neighborhood_id' => $neighborhoodId,
                'year' => $request->input('bridge')['year'],
                'source' => $request->input('bridge')['source'],
                'type' => 'bridge',
                'volume' => $request->input('bridge')['volume'],
                'achieve' => $request->input('bridge')['achieve'],
                'nominal' => $request->input('bridge')['nominal']
            ]);
            $achieve = $request->input('bridge')['achieve'] ?? $request->input('bridge')['firstCon'];
            $total->update([
                'value_bridge' => $achieve
            ]);
        }
        if ($latrineFunding != null) {
            $latrineFunding->update([
                'volume' => $request->input('latrine')['volume'],
                'achieve' => $request->input('latrine')['achieve'],
                'nominal' => $request->input('latrine')['nominal']
            ]);
            $achieve = $request->input('latrine')['achieve'] ?? $request->input('latrine')['firstCon'];
            $total->update([
                'value_latrine' => $achieve
            ]);
        } else {
            Funding::create([
                'neighborhood_id' => $neighborhoodId,
                'year' => $request->input('latrine')['year'],
                'source' => $request->input('latrine')['source'],
                'type' => 'latrine',
                'volume' => $request->input('latrine')['volume'],
                'achieve' => $request->input('latrine')['achieve'],
                'nominal' => $request->input('latrine')['nominal']
            ]);
            $achieve = $request->input('latrine')['achieve'] ?? $request->input('latrine')['firstCon'];
            $total->update([
                'value_latrine' => $achieve
            ]);
        }
        if ($septicTankFunding != null) {
            $septicTankFunding->update([
                'volume' => $request->input('septicTank')['volume'],
                'achieve' => $request->input('septicTank')['achieve'],
                'nominal' => $request->input('septicTank')['nominal']
            ]);
            $achieve = $request->input('septicTank')['achieve'] ?? $request->input('septicTank')['firstCon'];
            $total->update([
                'value_septic_tank' => $achieve
            ]);
        } else {
            Funding::create([
                'neighborhood_id' => $neighborhoodId,
                'year' => $request->input('septicTank')['year'],
                'source' => $request->input('septicTank')['source'],
                'type' => 'septic_tank',
                'volume' => $request->input('septicTank')['volume'],
                'achieve' => $request->input('septicTank')['achieve'],
                'nominal' => $request->input('septicTank')['nominal']
            ]);
            $achieve = $request->input('septicTank')['achieve'] ?? $request->input('septicTank')['firstCon'];
            $total->update([
                'value_septic_tank' => $achieve
            ]);
        }
        if ($ipalFunding != null) {
            $ipalFunding->update([
                'volume' => $request->input('ipal')['volume'],
                'achieve' => $request->input('ipal')['achieve'],
                'nominal' => $request->input('ipal')['nominal']
            ]);
            $achieve = $request->input('ipal')['achieve'] ?? $request->input('ipal')['firstCon'];
            $total->update([
                'value_ipal' => $achieve
            ]);
        } else {
            Funding::create([
                'neighborhood_id' => $neighborhoodId,
                'year' => $request->input('ipal')['year'],
                'source' => $request->input('ipal')['source'],
                'type' => 'ipal',
                'volume' => $request->input('ipal')['volume'],
                'achieve' => $request->input('ipal')['achieve'],
                'nominal' => $request->input('ipal')['nominal']

            ]);
            $achieve = $request->input('ipal')['achieve'] ?? $request->input('ipal')['firstCon'];
            $total->update([
                'value_ipal' => $achieve
            ]);
        }
        return redirect('/landing-home')->with('import', 'Data berhasil disimpan!');
    }
    public function exportData($id)
    {
        $neighborhood = Neighborhood::where('id', $id)->first()->load('negative_list', 'house', 'water', 'sanitation');
        $map = 'PETA/administrasi/' . $neighborhood->district->name . '.jpg';

        $pdf = PDF::loadView('landing-page.export', ['neighborhood' => $neighborhood, 'map' => $map]);
        return $pdf->download('data.pdf');
    }
    public function streamData($id)
    {
        $neighborhood = Neighborhood::where('id', $id)->first()->load('negative_list', 'house', 'water', 'sanitation');
        $map = 'PETA/administrasi/' . $neighborhood->district->name . '.jpg';

        $pdf = PDF::loadView('landing-page.export', ['neighborhood' => $neighborhood, 'map' => $map]);
        return $pdf->stream();
    }
    public function exportFunding($houseId, $sanitationId, $year)
    {
        // Jika hanya ingin mengelompokkan data tanpa agregasi, lakukan pengelompokan setelah query
        $funding = Funding::with('achievement')
            ->where('years', $year)
            ->where('house_id', $houseId)
            ->where('sanitation_id', $sanitationId)
            ->get()
            ->groupBy('type'); // Kelompokkan di Collection, bukan di query

        // Debugging untuk melihat isi $funding

        // Buat PDF dari view
        $pdf = PDF::loadView('landing-page.export_funding', ['funding' => $funding]);

        // Stream PDF ke browser
        return $pdf->stream('data.pdf');
    }
    public function getFunding($neighborhoodId, $fundType)
    {
        $funding = Funding::where('neighborhood_id', $neighborhoodId)
            ->where('type', $fundType)
            ->whereIn('source', ['APBD', 'APBD_prov', 'APBN'])
            ->get()
            ->groupBy('source');
        return response()->json([
            'APBDfunding' => $funding->get('APBD', []),
            'APBDProvfunding' => $funding->get('APBD_prov', []),
            'APBNfunding' => $funding->get('APBN', []),
        ]);
    }

}
