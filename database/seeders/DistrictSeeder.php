<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            ['code' => '337401', 'name' => 'BANYUMANIK'],
            ['code' => '337402', 'name' => 'CANDISARI'],
            ['code' => '337403', 'name' => 'GAJAHMUNGKUR'],
            ['code' => '337404', 'name' => 'GAYAMSARI'],
            ['code' => '337405', 'name' => 'GENUK'],
            ['code' => '337406', 'name' => 'GUNUNGPATI'],
            ['code' => '337407', 'name' => 'MIJEN'],
            ['code' => '337408', 'name' => 'NGALIYAN'],
            ['code' => '337409', 'name' => 'PEDURUNGAN'],
            ['code' => '337410', 'name' => 'SEMARANGBARAT'],
            ['code' => '337411', 'name' => 'SEMARANGSELATAN'],
            ['code' => '337412', 'name' => 'SEMARANGTENGAH'],
            ['code' => '337413', 'name' => 'SEMARANGTIMUR'],
            ['code' => '337414', 'name' => 'SEMARANGUTARA'],
            ['code' => '337415', 'name' => 'TEMBALANG'],
            ['code' => '337416', 'name' => 'TUGU'],
        ];

        foreach ($arr as $item) {
            District::create($item);
        }
    }
}
