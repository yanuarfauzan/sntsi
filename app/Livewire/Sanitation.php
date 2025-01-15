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
    public $noSeptitankImagePath = null;
    public $ipalImagePath = null;
    public $map = null;
    public $fundValue = null;
    public $funding;
    public $chartSanitation = [];
    public $year = 2024;
    public $APBDfunding;
    public $APBDProvfunding;
    public $APBNfunding;
    public $listeners = ['setDataFromSanitation'];
    public $sanitations = [];
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
        $this->APBDfunding = $this->finalNeighborhood->funding->where('source', 'APBD')->groupBy('type')->all();
        $this->APBDProvfunding = $this->finalNeighborhood->funding->where('source', 'APBD_prov')->groupBy('type')->all();
        $this->APBNfunding = $this->finalNeighborhood->funding->where('source', 'APBN')->groupBy('type')->all();
        $this->fundValue = $value;
    }

    public function setDataFromSanitation($neighborhood, $sanitations)
    {
        $this->neighborhoods = $neighborhood;
        $this->rws = Neighborhood::where('village_id', $neighborhood['village_id'])->pluck('rw')->unique();
        $this->rts = Neighborhood::where('village_id', $neighborhood['village_id'])->pluck('rt')->unique();
        $this->sanitations = $sanitations;
        $neighborhood = Neighborhood::where('id', $neighborhood['id'])->first()->load('images', 'village', 'district', 'negative_list', 'house', 'water', 'sanitation');
        $this->finalNeighborhood = $neighborhood;
        $this->noSeptitankImagePath = $neighborhood->village->name . '/sanitasi/no septitank/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->ipalImagePath = $neighborhood->village->name . '/sanitasi/ipal/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->map = 'PETA/negatif/' . 'Negatif_Kec_' . $neighborhood->district->name . '.jpg';
        $this->dispatch('getNoSeptitankImagePath', $neighborhood->noSeptitankImagePath);
        $this->dispatch('getIpalImagePath', $neighborhood->ipalImagePath);
        $this->chartSanitation = [
            'labels' => [
                'Cubluk',
                'Tangki Septik',
                'ipal',
                'Tidak memiliki MCK',
                'Tidak memiliki Tangki Septik',
            ],
            'values' => [
                $sanitations['latrine'],
                $sanitations['septic_tank'],
                $sanitations['ipal'],
                $sanitations['no_toilet'],
                $sanitations['no_septic_tank'],
            ]
        ];
        $this->dispatch('getChartSanitation', $this->chartSanitation);
        $this->chartSanitationByRw = [
            'labels' => [
                'Cubluk',
                'Tangki Septik',
                'ipal',
                'Tidak memiliki MCK',
                'Tidak memiliki Tangki Septik',
            ],
            'values' => [
                $this->finalNeighborhood->latrine,
                $this->finalNeighborhood->septic_tank,
                $this->finalNeighborhood->ipal,
                $this->finalNeighborhood->no_toilet,
                $this->finalNeighborhood->no_septic_tank,
            ]
        ];
        $this->dispatch('getChartSanitationByRw', $this->chartSanitationByRw);
    }

    public function render()
    {
        return view('livewire.sanitation');
    }
}
