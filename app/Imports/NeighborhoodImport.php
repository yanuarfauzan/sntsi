<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Neighborhood;
use App\Models\Village;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NeighborhoodImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $districtId = District::where('name', $row['kecamatan'])->first()->id;
        $villageId = Village::where('name', $row['kelurahan'])->first()->id;
        $neighborhood = Neighborhood::create([
            'district_id' => $districtId,
            'village_id' => $villageId,
            'housing' => $row['nama_perumahan'],
            'rw' => $row['rw'],
            'rt' => $row['rt'],
            'krt' => $row['krt'],
            'kk' => $row['kk'],
            'population' => $row['populasi'],
            'is_slum' => $row['sk_kumuh'],
            'number_of_houses' => $row['jumlah_rumah'],
        ]);

        $neighborhood->negative_list()->create([
            'name' => $row['nama_foto_negatif_list'],
            'lat' => $row['latitude'],
            'log' => $row['logitude'],
        ]);

        $neighborhood->house()->create([
            'for_settlement' => $row['hunian'],
            'vacant_house' => $row('rumah_kosong'),
            'stores' => $row('toko'),
            'rail' => $row('sempadan_rel'),
            'river' => $row('sempadan_sungai'),
            'sutet' => $row('sutet'),
            'bridge' => $row('kolong_jembatan'),
            'flood' => $row('banjir'),
            'tidal_flood' => $row('rob'),
            'landslide' => $row('tanah_longsor'),
            'other' => $row('lainnya'),
            'owned' => $row('milik_sendiri'),
            'not_owned' => $row('bukan_milik_sendiri'),
            'lease' => $row('kontrak'),
        ]);

        $neighborhood->water()->create([
            'bottled_water' => $row('air_kemasan'),
            'refill_water' => $row('air_isi_ulang'),
            'piped_water_supply' => $row('leding'),
            'drilled_well' => $row('pompa'),
            'protected_well' => $row('sumur_terlindungi'),
            'unprotected_well' => $row('sumur_tak_terlindungi'),
            'protected_spring' => $row('mata_air_terlindungi'),
            'unprotected_spring' => $row('mata_air_tak_terlindungi'),
            'nature' => $row('air/sungai/danau/kolam/waduk'),
            'rainwater' => $row('air_hujan'),
            'other' => $row('lainnya'),
        ]);

        return $neighborhood->water()->create([
            'latrine' => $row('cubluk'),
            'septic_tank' => $row('tangki_septic'),
            'ipal' => $row('ipal_kamunal'),
            'no_toilet' => $row('tidak_memiliki_mck'),
            'no_septic_tank' => $row('tidak_memiliki_septitank'),
        ]);
    }
}
