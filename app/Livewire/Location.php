<?php

namespace App\Livewire;

use App\Models\House;
use App\Models\Total;
use App\Models\Water;
use App\Models\Village;
use Livewire\Component;
use App\Models\District;
use App\Models\Sanitation;
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
    public $year = 2024;
    public $isRouteImport = false;
    public $negativeList = [];
    public $sanitations = [];
    public $waters = [];
    public $allSum = [];
    public $applied = false;
    public $neighborhoodId;
    public $map;
    public function mount()
    {
        $this->districts = District::all();
        if (request()->routeIs('import')) {
            $this->isRouteImport = true;
        }
    }

    public function updatedDistrictId($districtId): void
    {
        $villages = Village::where('district_id', $districtId)->get();
        $this->villages = $villages;
        $district = $this->districts->where('id', $districtId)->first();
        $this->map = 'PETA/negatif/' . 'Negatif_Kec_' . $district->name . '.jpg';
        $this->updatedVillageId($villages[0]->id);
    }

    public function updatedVillageId($villageId)
    {
        $this->village_id = $villageId;
        $neighborhoods = Neighborhood::with('negative_list', 'house')->where('village_id', $villageId)
            ->where('district_id', $this->district_id)->get();
        $this->neighborhoods = $neighborhoods;
        $housesByVillage = House::whereHas('neighborhood', function ($query) use ($villageId) {
            $query->where('village_id', $villageId);
        })->get();
        $sanitationsByVillage = Sanitation::whereHas('neighborhood', function ($query) use ($villageId) {
            $query->where('village_id', $villageId);
        })->get();
        $watersByVillage = Water::whereHas('neighborhood', function ($query) use ($villageId) {
            $query->where('village_id', $villageId);
        })->get();
        $this->negativeList['flood'] = $housesByVillage->sum('flood');
        $this->negativeList['tidal_flood'] = $housesByVillage->sum('tidal_flood');
        $this->negativeList['landslide'] = $housesByVillage->sum('landslide');
        $this->negativeList['other'] = $housesByVillage->sum('other');
        $this->negativeList['vacant_house'] = $housesByVillage->sum('vacant_house');
        $this->negativeList['owned'] = $housesByVillage->sum('owned');
        $this->negativeList['not_owned'] = $housesByVillage->sum('not_owned');
        $this->negativeList['lease'] = $housesByVillage->sum('lease');
        $this->negativeList['stores'] = $housesByVillage->sum('stores');
        $this->sanitations['no_toilet'] = $sanitationsByVillage->sum('no_toilet');
        $this->sanitations['no_septic_tank'] = $sanitationsByVillage->sum('no_septic_tank');
        $this->waters['bottled_water'] = $watersByVillage->sum('bottled_water');
        $this->waters['refill_water'] = $watersByVillage->sum('refill_water');
        $this->waters['piped_water_supply'] = $watersByVillage->sum('piped_water_supply');
        $this->waters['drilled_well'] = $watersByVillage->sum('drilled_well');
        $this->waters['protected_well'] = $watersByVillage->sum('protected_well');
        $this->waters['unprotected_well'] = $watersByVillage->sum('unprotected_well');
        $this->waters['protected_spring'] = $watersByVillage->sum('protected_spring');
        $this->waters['unprotected_spring'] = $watersByVillage->sum('unprotected_spring');
        $this->waters['nature'] = $watersByVillage->sum('nature');
        $this->waters['rainwater'] = $watersByVillage->sum('rainwater');
        $this->waters['other'] = $watersByVillage->sum('other');
        $total = Total::where('village_id', $villageId)->first();
        if ($total === null) {
            Total::create([
                'village_id' => $villageId,
                'value_rail' => $housesByVillage->sum('rail'),
                'value_river' => $housesByVillage->sum('river'),
                'value_sutet' => $housesByVillage->sum('sutet'),
                'value_bridge' => $housesByVillage->sum('bridge'),
                'value_latrine' => $sanitationsByVillage->sum('latrine'),
                'value_septic_tank' => $sanitationsByVillage->sum('septic_tank'),
                'value_ipal' => $sanitationsByVillage->sum('ipal'),
            ]);
        }
        $total = Total::where('village_id', $villageId)->first();
        $this->negativeList['rail'] = $total->value_rail;
        $this->negativeList['river'] = $total->value_river;
        $this->negativeList['sutet'] = $total->value_sutet;
        $this->negativeList['bridge'] = $total->value_bridge;
        $this->sanitations['latrine'] = $total->value_latrine;
        $this->sanitations['septic_tank'] = $total->value_septic_tank;
        $this->sanitations['ipal'] = $total->value_ipal;
        $this->allSum['negative_list'] = $this->negativeList;
        $this->allSum['sanitations'] = $this->sanitations;
        $this->allSum['waters'] = $this->waters;
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
        $this->finalNeighborhood = $this->neighborhoodsByRw->where('rt', $rt)->first();
    }
    public function applyLocation()
    {
        $this->finalNeighborhood->load('negative_list', 'house');
        $this->neighborhoodId = $this->finalNeighborhood->id;

        $neighborhoodData = $this->finalNeighborhood->toArray();

        $this->dispatch('setDataFromImport', $this->allSum, $this->neighborhoodId, $this->village_id);
        $this->dispatch('setDataFromHome', $neighborhoodData, $this->negativeList);
        $this->dispatch('setDataFromSanitation', $neighborhoodData, $this->sanitations);
        $this->dispatch('setDataFromWater', $neighborhoodData, $this->waters);
        $this->dispatch('setIdExport', $this->neighborhoodId);
        $this->applied = true;

    }
    public function render()
    {
        return view('livewire.location');
    }
}
