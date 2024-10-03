<?php

namespace App\Livewire;

use App\Models\Village;
use Livewire\Component;
use App\Models\District;
use App\Models\Neighborhood;

class Location extends Component
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
    public $isRouteImport = false;
    public $neighborhoodId;
    public $listeners = ['getFundValue'];
    public function mount()
    {
        $this->districts = District::all();
        if (request()->routeIs('import')) {
            $this->isRouteImport = true;
        }
    }

    public function updatedDistrictId($districtId)
    {
        $villages = Village::where('district_id', $districtId)->get();
        $this->villages = $villages;
        $this->updatedVillageId($villages[0]->id);
        $district = $this->districts->where('id', $districtId)->first();
        $this->map = 'PETA/administrasi/' . $district->name . '.jpg';
    }

    public function updatedVillageId($villageId)
    {
        $neighborhoods = Neighborhood::where('village_id', $villageId)
            ->where('district_id', $this->district_id)->get();
        $this->neighborhoods = $neighborhoods;
        $this->rws = $neighborhoods->pluck('rw')->unique()->values()->all();
        $this->updatedRw($this->rws[0]);
    }
    public function updatedRw($rw)
    {
        $this->neighborhoodsByRw = $this->neighborhoods->where('rw', $rw);
        $this->rts = $this->neighborhoodsByRw->pluck('rt')->values()->all();
        $this->updatedRt($this->rts[0]);
    }
    public function updatedRt($rt)
    {
        $this->finalNeighborhood = $this->neighborhoodsByRw->where('rt', $rt)->first()->load('negative_list', 'house');
    }
    public function applyLocation()
    {
        $this->dispatch('setDataFromImport', $this->finalNeighborhood);
        $this->dispatch('setDataFromHome', $this->finalNeighborhood);
        $this->dispatch('setDataFromSanitation', $this->finalNeighborhood);
        $this->dispatch('setDataFromWater', $this->finalNeighborhood);
        $this->neighborhoodId = $this->finalNeighborhood->id;
    }
    public function getFundValue($value)
    {
        $this->fundValue = $value;
    }
    public function render()
    {
        return view('livewire.location');
    }
}
