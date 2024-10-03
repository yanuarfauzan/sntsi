<?php

namespace App\Livewire;

use App\Models\Village;
use Livewire\Component;
use App\Models\Neighborhood;

class Water extends Component
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
    public $chartWater = [];
    public $map = null;
    public $listeners = ['setDataFromWater'];

    public function mount($districts)
    {
        $this->districts = $districts;
    }

    public function setTypeMap($type)
    {
        $areaName = explode('_', $type)[1] == 'Kec' ? $this->finalNeighborhood->district->name : $this->finalNeighborhood->village->name;
        $this->map = 'PETA/jenis/' . $type . '_' . $areaName . '.jpg';
    }
    
    public function setDataFromWater($neighborhood)
    {
        $neighborhood = Neighborhood::where('id', $neighborhood['id'])->first()->load('images', 'village', 'district', 'negative_list', 'house', 'water', 'sanitation');
        $this->finalNeighborhood = $neighborhood;
        $this->map = 'PETA/administrasi/' . $neighborhood->district->name . '.jpg';
    }

    public function render()
    {
        return view('livewire.water');
    }
}
