<?php

namespace App\Livewire;

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
    public $rw = [];
    public $rws = [];
    public $rt = [];
    public $rts = [];
    public $chartDataNegativeList = [];
    public $chartDataKawasanRawan = [];
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
    public $listeners = ['setDataFromHome'];

    public function mount($districts)
    {
        $this->districts = $districts;
    }

    public function setTypeFund($type)
    {
        $this->typeFund = $type;
    }

    public function setDataFromHome($neighborhood)
    {
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
        $this->map = 'PETA/administrasi/' . $neighborhood->district->name . '.jpg';
        $this->chartDataNegativeList = [
            'labels' => [
                'rel',
                'sungai',
                'Sutet',
                'Kol jembatan',
            ],
            'values' => [
                $neighborhood->house->rail ?? 5,
                $neighborhood->house->river ?? 5,
                $neighborhood->house->sutet ?? 5,
                $neighborhood->house->bridge ?? 5
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
                $neighborhood->house->flood ?? 5,
                $neighborhood->house->tidal_flood ?? 5,
                $neighborhood->house->landslide ?? 5,
                $neighborhood->house->other ?? 5
            ]
        ];
        $this->dispatch('getChartDataKawasanRawan', $this->chartDataKawasanRawan);
    }
    public function setTypeMap($type)
    {
        $areaName = explode('_', $type)[1] == 'Kec' ? $this->finalNeighborhood->district->name : $this->finalNeighborhood->village->name;
        $this->map = 'PETA/jenis/' . $type . '_' . $areaName . '.jpg';
    }
    public function setFund($value)
    {
        $this->fundValue = $value;
        $this->dispatch('getFundValue', $this->fundValue);
    }

    public function render()
    {
        return view('livewire.landing-home');
    }
}
