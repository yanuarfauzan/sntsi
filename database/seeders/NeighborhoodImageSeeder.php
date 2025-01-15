<?php

namespace Database\Seeders;

use App\Models\Neighborhood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NeighborhoodImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $neighborhood = Neighborhood::all();
        foreach ($neighborhood as $item) {
            $name = $item->rw . '_' . $item->rt . '.jpg';
            $locationPath = $item->village->name . '/lokasi' . '/' . $name;
            $riverPath = $item->village->name . '/sepadan sungai' . '/' . $name;
            $railPath = $item->village->name . '/rel' . '/' . $name;
            $floodPath = $item->village->name . '/rawan bencana banjir' . '/' . $name;
            $landslidePath = $item->village->name . '/rawan bencana longsor' . '/' . $name;
            $sutetPath = $item->village->name . '/sutet' . '/' . $name;
            $bridgePath = $item->village->name . '/kolong jembatan' . '/' . $name;
            $robPath = $item->village->name . '/rob' . '/' . $name;
            if (Storage::disk('public')->exists($locationPath)) {
                $item->images()->create([
                    'path' => $locationPath,
                    'name' => $name
                ]);
            }
            if (Storage::disk('public')->exists($riverPath)) {
                $item->images()->create([
                    'path' => $riverPath,
                    'name' => $name
                ]);
            }
            if (Storage::disk('public')->exists($railPath)) {
                $item->images()->create([
                    'path' => $railPath,
                    'name' => $name
                ]);
            }
            if (Storage::disk('public')->exists($floodPath)) {
                $item->images()->create([
                    'path' => $floodPath,
                    'name' => $name
                ]);
            }
            if (Storage::disk('public')->exists($landslidePath)) {
                $item->images()->create([
                    'path' => $landslidePath,
                    'name' => $name
                ]);
            }
            if (Storage::disk('public')->exists($sutetPath)) {
                $item->images()->create([
                    'path' => $sutetPath,
                    'name' => $name
                ]);
            }
            if (Storage::disk('public')->exists($bridgePath)) {
                $item->images()->create([
                    'path' => $bridgePath,
                    'name' => $name
                ]);
            }
            if (Storage::disk('public')->exists($robPath)) {
                $item->images()->create([
                    'path' => $robPath,
                    'name' => $name
                ]);
            }
        }
        
    }
}
