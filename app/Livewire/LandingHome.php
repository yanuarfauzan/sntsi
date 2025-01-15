<?php

namespace App\Livewire;

use App\Models\Funding;
use App\Models\Village;
use Livewire\Component;
use App\Models\Neighborhood;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;



class LandingHome extends Component
{
    public $districts;
    public $villages = [];
    public $district_id;
    public $village_id;
    public $neighborhoods = [];
    public $neighborhoodsByRw = [];
    public $finalNeighborhood = [];
    public $chartDataNegativeList = [];
    public $chartDataNegativeListByRw = [];
    public $chartDataKawasanRawan = [];
    public $chartDataKawasanRawanByRw = [];
    public $floodImagePaths = [];
    public $landslideImagePaths = [];
    public $riverImagePaths = [];
    public $sutetImagePath = null;
    public $railImagePath = null;
    public $bridgeImagePath = null;
    public $robImagePath = null;
    public $map = null;
    public $typeFund = null;
    public $fundValue = null;
    public $year = 2024;
    public $APBDfunding;
    public $APBDProvfunding;
    public $APBNfunding;
    public $negativeList;
    public $listeners = ['setDataFromHome'];

    public function mount($districts)
    {
        $this->districts = $districts;
    }

    public function setDataFromHome($neighborhood, $negativeList)
    {
        $this->negativeList = $negativeList;
        $neighborhood = Neighborhood::where('id', $neighborhood['id'])->first()->load('images', 'village', 'district', 'negative_list', 'house', 'water', 'sanitation');
        $this->finalNeighborhood = $neighborhood;
        $this->floodImagePaths[] = $neighborhood->village->name . '/rawan bencana banjir' . '/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->landslideImagePaths[] = $neighborhood->village->name . '/rawan bencana longsor' . '/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->riverImagePaths[] = $neighborhood->village->name . '/sepadan sungai' . '/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->sutetImagePath = $neighborhood->village->name . '/sutet' . '/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->railImagePath = $neighborhood->village->name . '/rel' . '/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->bridgeImagePath = $neighborhood->village->name . '/kolong jembatan' . '/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->robImagePath = $neighborhood->village->name . '/rob' . '/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->dispatch('getFloodImagePaths', $this->floodImagePaths);
        $this->dispatch('getLandslideImagePaths', $this->landslideImagePaths);
        $this->dispatch('getRiverImagePaths', $this->riverImagePaths);
        $this->dispatch('getSutetImagePath', $this->sutetImagePath);
        $this->dispatch('getRailImagePath', $this->railImagePath);
        $this->dispatch('getBridgeImagePath', $this->bridgeImagePath);
        $this->dispatch('getRobImagePath', $this->robImagePath);
        $this->finalNeighborhood = $neighborhood;
        $this->map = 'PETA/negatif/' . 'Negatif_Kec_' . $neighborhood->district->name . '.jpg';
        $this->chartDataNegativeList = [
            'labels' => [
                'rel',
                'sungai',
                'Sutet',
                'Kol jembatan',
            ],
            'values' => [
                $negativeList['rail'],
                $negativeList['river'],
                $negativeList['sutet'],
                $negativeList['bridge']
            ]
        ];
        $this->dispatch('getChartDataNegativeList', $this->chartDataNegativeList);
        $this->chartDataKawasanRawan = [
            'labels' => [
                'Banjir',
                'Rob',
                'longsor',
                'Lainnya'
            ],
            'values' => [
                $negativeList['flood'],
                $negativeList['tidal_flood'],
                $negativeList['landslide'],
                $negativeList['other']
            ]
        ];
        $this->dispatch('getChartDataKawasanRawan', $this->chartDataKawasanRawan);


        $this->chartDataNegativeListByRw = [
            'labels' => [
                'rel',
                'sungai',
                'Sutet',
                'Kol jembatan',
            ],
            'values' => [
                $this->finalNeighborhood->rail,
                $this->finalNeighborhood->river,
                $this->finalNeighborhood->sutet,
                $this->finalNeighborhood->bridge
            ]
        ];
        $this->dispatch('getChartDataNegativeListByRw', $this->chartDataNegativeListByRw);
        $this->chartDataKawasanRawanByRw = [
            'labels' => [
                'Banjir',
                'Rob',
                'longsor',
                'Lainnya'
            ],
            'values' => [
                $this->finalNeighborhood->flood,
                $this->finalNeighborhood->tidal_flood,
                $this->finalNeighborhood->landslide,
                $this->finalNeighborhood->other
            ]
        ];
        $this->dispatch('getChartDataKawasanRawanByRw', $this->chartDataKawasanRawanByRw);
    }
    public function updatedYear($year)
    {
        $this->year = $year;
    }
    public function setTypeMap($type)
    {
        $areaName = explode('_', $type)[1] == 'Kec' ? $this->finalNeighborhood->district->name : $this->finalNeighborhood->village->name;
        $this->map = 'PETA/jenis/' . $type . '_' . $areaName . '.jpg';
    }

    public function render()
    {
        return view('livewire.landing-home');
    }
}
