<?php

namespace App\Imports;

use App\Models\Village;
use App\Models\District;
use App\Models\Neighborhood;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NeighborhoodImport implements ToModel, WithHeadingRow
{
    protected $spreadsheet;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function __construct($spreadsheet)
    {
        $this->spreadsheet = IOFactory::load($spreadsheet);
    }

    public function model(array $row)
    {

        $sheet = $this->spreadsheet->getActiveSheet();
        $drawings = $sheet->getDrawingCollection(); // Mengambil koleksi gambar
        // Sempadan Rel
        $targetColumn = 'AS';
        foreach ($drawings as $drawing) {
            $coordinates = $drawing->getCoordinates();
            if (strpos($coordinates, $targetColumn) === 0) {
                $name = $row['rw'] . '_' . $row['rt'] . '.' . $drawing->getExtension();
                $destination = $row['kelurahan'] . '/sepadan rel' . '/' . $name;
                $imageContent = file_get_contents($drawing->getPath());
                Storage::disk('public')->put($destination, $imageContent);
            }
        }
        // Sempadan sungai
        $targetColumn = 'AT';
        foreach ($drawings as $drawing) {
            $coordinates = $drawing->getCoordinates();
            if (strpos($coordinates, $targetColumn) === 0) {
                $name = $row['rw'] . '_' . $row['rt'] . '.' . $drawing->getExtension();
                $destination = $row['kelurahan'] . '/sepadan sungai' . '/'. $name;
                $imageContent = file_get_contents($drawing->getPath());
                Storage::disk('public')->put($destination, $imageContent);
            }
        }
        // Sempadan kolong jembatan
        $targetColumn = 'AU';
        foreach ($drawings as $drawing) {
            $coordinates = $drawing->getCoordinates();
            if (strpos($coordinates, $targetColumn) === 0) {
                $name = $row['rw'] . '_' . $row['rt'] . '.' . $drawing->getExtension();
                $destination = $row['kelurahan'] . '/kolong jembatan' . '/' . $name;
                $imageContent = file_get_contents($drawing->getPath());
                Storage::disk('public')->put($destination, $imageContent);
            }
        }
        // Cubluk
        $targetColumn = 'AV';
        foreach ($drawings as $drawing) {
            $coordinates = $drawing->getCoordinates();
            if (strpos($coordinates, $targetColumn) === 0) {
                $name = $row['rw'] . '_' . $row['rt'] . '.' . $drawing->getExtension();
                $destination = $row['kelurahan'] . '/cubluk' . '/' . $name;
                $imageContent = file_get_contents($drawing->getPath());
                Storage::disk('public')->put($destination, $imageContent);
            }
        }
        // Septitank
        $targetColumn = 'AW';
        foreach ($drawings as $drawing) {
            $coordinates = $drawing->getCoordinates();
            if (strpos($coordinates, $targetColumn) === 0) {
                $name = $row['rw'] . '_' . $row['rt'] . '.' . $drawing->getExtension();
                $destination = $row['kelurahan'] . '/sanitasi/no septitank' . '/' . $name;
                $imageContent = file_get_contents($drawing->getPath());
                Storage::disk('public')->put($destination, $imageContent);
            }
        }
        // Ipal
        $targetColumn = 'AX';
        foreach ($drawings as $drawing) {
            $coordinates = $drawing->getCoordinates();
            if (strpos($coordinates, $targetColumn) === 0) {
                $name = $row['rw'] . '_' . $row['rt'] . '.' . $drawing->getExtension();
                $destination = $row['kelurahan'] . '/sanitasi/ipal' . '/' . $name;
                $imageContent = file_get_contents($drawing->getPath());
                Storage::disk('public')->put($destination, $imageContent);
            }
        }        
        // Banjir
        $targetColumn = 'AY';
        foreach ($drawings as $drawing) {
            $coordinates = $drawing->getCoordinates();
            if (strpos($coordinates, $targetColumn) === 0) {
                $name = $row['rw'] . '_' . $row['rt'] . '.' . $drawing->getExtension();
                $destination = $row['kelurahan'] . '/rawan bencan banjir' . '/' . $name;
                $imageContent = file_get_contents($drawing->getPath());
                Storage::disk('public')->put($destination, $imageContent);
            }
        }        
        // Banjir
        $targetColumn = 'AZ';
        foreach ($drawings as $drawing) {
            $coordinates = $drawing->getCoordinates();
            if (strpos($coordinates, $targetColumn) === 0) {
                $name = $row['rw'] . '_' . $row['rt'] . '.' . $drawing->getExtension();
                $destination = $row['kelurahan'] . '/rawan bencan longsor' . '/' . $name;
                $imageContent = file_get_contents($drawing->getPath());
                Storage::disk('public')->put($destination, $imageContent);
            }
        }        
        // ROB
        $targetColumn = 'BA';
        foreach ($drawings as $drawing) {
            $coordinates = $drawing->getCoordinates();
            if (strpos($coordinates, $targetColumn) === 0) {
                $name = $row['rw'] . '_' . $row['rt'] . '.' . $drawing->getExtension();
                $destination = $row['kelurahan'] . '/rob' . '/' . $name;
                $imageContent = file_get_contents($drawing->getPath());
                Storage::disk('public')->put($destination, $imageContent);
            }
        }        
        $this->rw = $row['rw'];
        $this->rt = $row['rt'];
        $this->kelurahan = $row['kelurahan'];
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
            'long' => $row['longitude'],
        ]);

        $neighborhood->house()->create([
            'for_settlement' => $row['hunian'],
            'vacant_house' => $row['rumah_kosong'],
            'stores' => $row['toko'],
            'rail' => $row['sempadan_rel'],
            'river' => $row['sempadan_sungai'],
            'sutet' => $row['sutet'],
            'bridge' => $row['kolong_jembatan'],
            'flood' => $row['banjir'],
            'tidal_flood' => $row['rob'],
            'landslide' => $row['tanah_longsor'],
            'other' => $row['lainnya'],
            'owned' => $row['milik_sendiri'],
            'not_owned' => $row['bukan_milik_sendiri'],
            'lease' => $row['kontrak'],
        ]);

        $neighborhood->water()->create([
            'bottled_water' => $row['air_kemasan'],
            'refill_water' => $row['air_isi_ulang'],
            'piped_water_supply' => $row['leding'],
            'drilled_well' => $row['pompa'],
            'protected_well' => $row['sumur_terlindungi'],
            'unprotected_well' => $row['sumur_tak_terlindungi'],
            'protected_spring' => $row['mata_air_terlindungi'],
            'unprotected_spring' => $row['mata_air_tak_terlindungi'],
            'nature' => $row['alam'],
            'rainwater' => $row['air_hujan'],
            'other' => $row['lainnya'],
        ]);

        $neighborhood->sanitation()->create([
            'latrine' => $row['cubluk'],
            'septic_tank' => $row['tangki_septic'],
            'ipal' => $row['ipal_komunal'],
            'no_toilet' => $row['tidak_memiliki_mck'],
            'no_septic_tank' => $row['tidak_memiliki_septitank'],
        ]);
    }
}
