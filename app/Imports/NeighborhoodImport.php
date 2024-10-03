<?php

namespace App\Imports;

use App\Models\Neighborhood;
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
        return new Neighborhood([
            'district_id' => $row['kecamatam'],
            'village_id' => $row['kelurahan'],
            'housing' => $row['nama perumahan'],
            'rw' => $row['rw'],
            'rt' => $row['rt'],
            'krt' => $row['krt'],
            'kk' => $row['kk'],
            'population' => $row['population'],
            'is_slum' => $row['SK kumuh'],
            'number_of_houses' => $row['jumlah rumah'],
        ]);
    }
}
