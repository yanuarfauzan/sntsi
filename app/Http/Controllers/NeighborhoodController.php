<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\District;
use Illuminate\Support\Str;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use App\Models\NeighborhoodImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class NeighborhoodController extends Controller
{
    public function index()
    {
        $neighborhoods = Neighborhood::with('house', 'water', 'sanitation', 'negative_list', 'images')
            ->get();
        return view('neighborhoods.index', [
            'neighborhoods' => $neighborhoods,
            'districts' => District::select('id', 'name')->get()
        ]);
    }

    public function edit(Neighborhood $neighborhood)
    {
        return view('neighborhoods.edit', [
            'districts' => District::select('id', 'name')->get(),
            'villages' => Village::select('id', 'name')->get(),
            'neighborhood' => $neighborhood->load('negative_list', 'house', 'water', 'sanitation')
        ]);
    }

    public function update(Request $request, Neighborhood $neighborhood)
    {
        if ($request->has('images')) {
            $village = Village::findOrFail($neighborhood->village_id);
            $rw = $request->rw;
            $rt = $request->rt;
            foreach ($request->images as $image) {
                $extension = $image->getClientOriginalExtension();
                if ($extension != 'jpg') {
                    return back()->with('error', 'Format file harus jpg');
                }
                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                switch (true) {
                    case explode('_', $originalName)[0] == 'lokasi':
                        $keyPath = 'lokasi';
                        break;
                    case explode('_', $originalName)[0] == 'rel':
                        $keyPath = 'rel';
                        break;
                    case explode('_', $originalName)[0] == 'sungai':
                        $keyPath = 'sepadan sungai';
                        break;
                    case explode('_', $originalName)[0] == 'banjir':
                        $keyPath = 'rawan bencana banjir';
                        break;
                    case explode('_', $originalName)[0] == 'longsor':
                        $keyPath = 'rawan bencana longsor';
                        break;
                    case explode('_', $originalName)[0] == 'rob':
                        $keyPath = 'rob';
                        break;
                    case explode('_', $originalName)[0] == 'sutet':
                        $keyPath = 'sutet';
                        break;
                    case explode('_', $originalName)[0] == 'jembatan':
                        $keyPath = 'kolong jembatan';
                        break;
                }
                $name = $rw . '_' . $rt . '.jpg';
                $destination = 'public/' . $village->name . '/' . $keyPath . '/' . $name;
                $path = $village->name . '/' . $keyPath . '/' . $name;
                Storage::put($destination, file_get_contents($image->getRealPath()));
                $neighborhood->images()->create([
                    'name' => $name,
                    'path' => $path
                ]);
            }
        }
        if ($request->has('xhps')) {
            $village = Village::findOrFail($neighborhood->village_id);
            foreach ($request->xhps as $xhp) {
                $extension = $xhp->getClientOriginalExtension();
                if ($extension != 'xhp') {
                    return back()->with('error', 'Format file harus xhp');
                }
                $name = $village->name . '.' . $extension;
                $destination = 'public/PETA/xhp/' . $name;
                $path = 'PETA/xhp/' . $name;
                Storage::put($destination, file_get_contents($xhp->getRealPath()));
                $neighborhood->images()->create([
                    'name' => $name,
                    'path' => $path
                ]);
            }
        }
        $request->validate([
            'district_id' => ['required', 'numeric', 'exists:districts,id'],
            'village_id' => ['required', 'numeric', 'exists:villages,id'],
            'housing' => ['nullable', 'string', 'max:255'],
            'rt' => ['nullable', 'numeric'],
            'rw' => ['nullable', 'numeric'],
            'krt' => ['nullable', 'numeric'],
            'kk' => ['nullable', 'numeric'],
            'population' => ['nullable', 'numeric'],
            'is_slum' => ['nullable', 'boolean'],
            'number_of_houses' => ['nullable', 'numeric'],
            'negative_list.name' => ['nullable', 'string'],
            'negative_list.lat' => ['nullable', 'string'],
            'negative_list.long' => ['nullable', 'string'],
            'house.for_settlement' => ['nullable', 'numeric'],
            'house.vacant_house' => ['nullable', 'numeric'],
            'house.stores' => ['nullable', 'numeric'],
            'house.rail' => ['nullable', 'numeric'],
            'house.river' => ['nullable', 'numeric'],
            'house.sutet' => ['nullable', 'numeric'],
            'house.bridge' => ['nullable', 'numeric'],
            'house.flood' => ['nullable', 'numeric'],
            'house.tidal_flood' => ['nullable', 'numeric'],
            'house.landslide' => ['nullable', 'numeric'],
            'house.other' => ['nullable', 'numeric'],
            'house.owned' => ['nullable', 'numeric'],
            'house.not_owned' => ['nullable', 'numeric'],
            'house.lease' => ['nullable', 'numeric'],
            'water.bottled_water' => ['nullable', 'numeric'],
            'water.refill_water' => ['nullable', 'numeric'],
            'water.piped_water_supply' => ['nullable', 'numeric'],
            'water.drilled_well' => ['nullable', 'numeric'],
            'water.protected_well' => ['nullable', 'numeric'],
            'water.unprotected_well' => ['nullable', 'numeric'],
            'water.protected_spring' => ['nullable', 'numeric'],
            'water.unprotected_spring' => ['nullable', 'numeric'],
            'water.nature' => ['nullable', 'numeric'],
            'water.rainwater' => ['nullable', 'numeric'],
            'water.other' => ['nullable', 'numeric'],
            'sanitation.latrine' => ['nullable', 'numeric'],
            'sanitation.septic_tank' => ['nullable', 'numeric'],
            'sanitation.ipal' => ['nullable', 'numeric'],
            'sanitation.no_toilet' => ['nullable', 'numeric'],
            'sanitation.no_septic_tank' => ['nullable', 'numeric'],
            'images.*' => ['nullable', 'image', 'max:10240']
        ]);

        $neighborhood->negative_list()->update([
            'name' => $request->input('negative_list.name'),
            'lat' => $request->input('negative_list.lat'),
            'long' => $request->input('negative_list.long'),
        ]);

        $neighborhood->update([
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'housing' => $request->housing,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'krt' => $request->krt,
            'kk' => $request->kk,
            'population' => $request->population,
            'is_slum' => $request->is_slum ?? 0,
            'number_of_houses' => $request->number_of_houses,
        ]);

        $neighborhood->house()->update([
            'for_settlement' => $request->input('house.for_settlement'),
            'vacant_house' => $request->input('house.vacant_house'),
            'stores' => $request->input('house.stores'),
            'rail' => $request->input('house.rail'),
            'river' => $request->input('house.river'),
            'sutet' => $request->input('house.sutet'),
            'bridge' => $request->input('house.bridge'),
            'flood' => $request->input('house.flood'),
            'tidal_flood' => $request->input('house.tidal_flood'),
            'landslide' => $request->input('house.landslide'),
            'other' => $request->input('house.other'),
            'owned' => $request->input('house.owned'),
            'not_owned' => $request->input('house.not_owned'),
            'lease' => $request->input('house.lease'),
        ]);

        $neighborhood->water()->update([
            'bottled_water' => $request->input('water.bottled_water'),
            'refill_water' => $request->input('water.refill_water'),
            'piped_water_supply' => $request->input('water.piped_water_supply'),
            'drilled_well' => $request->input('water.drilled_well'),
            'protected_well' => $request->input('water.protected_well'),
            'unprotected_well' => $request->input('water.unprotected_well'),
            'protected_spring' => $request->input('water.protected_spring'),
            'unprotected_spring' => $request->input('water.unprotected_spring'),
            'nature' => $request->input('water.nature'),
            'rainwater' => $request->input('water.rainwater'),
            'other' => $request->input('water.other'),
        ]);

        $neighborhood->sanitation()->update([
            'latrine' => $request->input('sanitation.latrine'),
            'septic_tank' => $request->input('sanitation.septic_tank'),
            'ipal' => $request->input('sanitation.ipal'),
            'no_toilet' => $request->input('sanitation.no_toilet'),
            'no_septic_tank' => $request->input('sanitation.no_septic_tank'),
        ]);



        return back()->with('success', 'Data berhasil disimpan.');
    }

    public function destroy(Neighborhood $neighborhood, NeighborhoodImage $neighborhoodImage)
    {
        if ($neighborhood->id != $neighborhoodImage->neighborhood_id) {
            return back()->with('error', 'Hapus foto gagal.');
        }

        $path = str_replace('storage/', '', $neighborhoodImage->path);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $neighborhoodImage->delete();
        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
