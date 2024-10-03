<?php

namespace App\Livewire;

use App\Models\Village;
use Livewire\Component;
use App\Models\Neighborhood;

class Sanitation extends Component
{
    public $districts;
    public $villages = [];
    public $district_id;
    public $village_id;
    public $neighborhoods = [];
    public $neighborhoodsByRw = [];
    public $finalNeighborhood = [];
    public $rw = [];
    public $rws = [];
    public $rt = [];
    public $rts = [];
    public $noSeptitankImagePath = null;
    public $ipalImagePath = null;
    public $map = null;
    public $fundValue = null;
    public $chartSanitation = [];
    public $listeners = ['setDataFromSanitation'];

    public function mount($districts)
    {
        $this->districts = $districts;
    }

    public function setTypeMap($type)
    {
        $areaName = explode('_', $type)[1] == 'Kec' ? $this->finalNeighborhood->district->name : $this->finalNeighborhood->village->name;
        $this->map = 'PETA/jenis/' . $type . '_' . $areaName . '.jpg';
    }

    public function setFund($value)
    {
        $this->fundValue = $value;
    }

    public function setDataFromSanitation($neighborhood)
    {
        $neighborhood = Neighborhood::where('id', $neighborhood['id'])->first()->load('images', 'village', 'district', 'negative_list', 'house', 'water', 'sanitation');
        $this->finalNeighborhood = $neighborhood;
        $this->noSeptitankImagePath = $neighborhood->village->name . '/sanitasi/no septitank/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->ipalImagePath = $neighborhood->village->name . '/sanitasi/ipal/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->map = 'PETA/administrasi/' . $neighborhood->district->name . '.jpg';
        $this->dispatch('getNoSeptitankImagePath', $neighborhood->noSeptitankImagePath);
        $this->dispatch('getIpalImagePath', $neighborhood->ipalImagePath);
        $this->chartSanitation = [
            'labels' => [
                'Tidak Terlayani Sanitasi',
                'Tidak Memiliki MCK',
                'Tidak Memiliki Septitank',
            ],
            'values' => [
                0,
                $neighborhood->negative_list->no_toilet ?? 5,
                $neighborhood->negative_list->no_septic_tank ?? 5,
            ]
        ];
        $this->dispatch('getChartSanitation', $this->chartSanitation);
    }

    public function render()
    {
        return view('livewire.sanitation');
    }
}
