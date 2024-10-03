<?php

namespace App\Imports;

use App\Models\Village;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VillageImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Village([
            'district_id' => $row['kelurahan'],
            'code' => $row['kode'],
            'name' => $row['nama'],
        ]);
    }
}
