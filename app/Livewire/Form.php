<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Neighborhood;

class Form extends Component
{
    public $listeners = ['setDataFromImport'];
    public $dataGroupedByType;
    public $allSum;
    // public $APBDfunding;
    // public $APBDProvfunding;
    // public $APBNfunding;
    // public $finalNeighborhood;
    public $fund_value = 'rail';

    // public $railApbd;
    // public $railApbdProv;
    // public $rail_APBN;
    // public $river_APBD;
    // public $river_APBD_prov;
    // public $river_APBN;
    // public $sutet_APBD;
    // public $sutet_APBD_prov;
    // public $sutet_APBN;
    // public $bridge_APBD;
    // public $bridge_APBD_prov;
    // public $bridge_APBN;
    // public $latrine_APBD;
    // public $latrine_APBD_prov;
    // public $septic_tank_APBD;
    // public $septic_tank_APBD_prov;
    // public $septic_tank_APBN;
    // public $ipal_APBD;
    // public $ipal_APBD_prov;
    // public $ipal_APBN;
    // public $railAchieve = 0;
    public function mount($districts)
    {
        $this->districts = $districts;
    }

    public function setDataFromImport($allSum, $neighborhoodId, $villageId)
    {
        $this->finalNeighborhood = Neighborhood::with('funding')->where('id', $neighborhoodId)->first();
        $data = [
            'rail' => $allSum['negative_list']['rail'] ?? 0,
            'river' => $allSum['negative_list']['river'] ?? 0,
            'sutet' => $allSum['negative_list']['sutet'] ?? 0,
            'bridge' => $allSum['negative_list']['bridge'] ?? 0,
            'latrine' => $allSum['sanitations']['latrine'] ?? 0,
            'septic_tank' => $allSum['sanitations']['septic_tank'] ?? 0,
            'ipal' => $allSum['sanitations']['ipal'] ?? 0,


            // 'rail_APBD' => $dataGroupedByType['APBD'][0]['rail'] ?? 0,
            // 'rail_APBD_prov' => $dataGroupedByType['APBD_prov'][0]['rail'] ?? 0,
            // 'rail_APBN' => $dataGroupedByType['APBN'][0]['rail'] ?? 0,
            // 'river_APBD' => $dataGroupedByType['APBN'][0]['river'] ?? 0,
            // 'river_APBD_prov' => $dataGroupedByType['APBD_prov'][0]['river'] ?? 0,
            // 'river_APBN' => $dataGroupedByType['APBN'][0]['river'] ?? 0,
            // 'sutet_APBD' => $dataGroupedByType['APBD'][0]['sutet'] ?? 0,
            // 'sutet_APBD_prov' => $dataGroupedByType['APBD_prov'][0]['sutet'] ?? 0,
            // 'sutet_APBN' => $dataGroupedByType['APBN'][0]['sutet'] ?? 0,
            // 'bridge_APBD' => $dataGroupedByType['APBD'][0]['bridge'] ?? 0,
            // 'bridge_APBD_prov' => $dataGroupedByType['APBD_prov'][0]['bridge'] ?? 0,
            // 'bridge_APBN' => $dataGroupedByType['APBN'][0]['bridge'] ?? 0,
            // 'latrine_APBD' => $dataGroupedByType['APBD'][0]['latrine'] ?? 0,
            // 'latrine_APBD_prov' => $dataGroupedByType['APBD_prov'][0]['latrine'] ?? 0,
            // 'latrine_APBN' => $dataGroupedByType['APBN'][0]['latrine'] ?? 0,
            // 'septic_tank_APBD' => $dataGroupedByType['APBD'][0]['septic_tank'] ?? 0,
            // 'septic_tank_APBD_prov' => $dataGroupedByType['APBD_prov'][0]['septic_tank'] ?? 0,
            // 'septic_tank_APBN' => $dataGroupedByType['APBN'][0]['septic_tank'] ?? 0,
            // 'ipal_APBD' => $dataGroupedByType['APBD'][0]['ipal'] ?? 0,
            // 'ipal_APBD_prov' => $dataGroupedByType['APBD_prov'][0]['ipal'] ?? 0,
            // 'ipal_APBN' => $dataGroupedByType['APBN'][0]['ipal'] ?? 0,
            // 'rail_achieve' => $achievement->rail_achieve ?? 0,
            // 'river_achieve' => $achievement->river_achieve ?? 0,
            // 'sutet_achieve' => $achievement->sutet_achieve ?? 0,
            // 'bridge_achieve' => $achievement->bridge_achieve ?? 0,
            // 'latrine_achieve' => $achievement->latrine_achieve ?? 0,
            // 'septic_tank_achieve' => $achievement->septic_tank_achieve ?? 0,
            // 'ipal_achieve' => $achievement->ipal_achieve ?? 0,
        ];
        $this->dispatch('showValueInput', $data);
        $data = ['neighborhoodId' => $neighborhoodId, 'villageId' => $villageId];
        $this->dispatch('unDisable', $data);

        $this->dispatch('getFunding');
        // $dataFunding = [
        //     'houseId' => $houseId,
        //     'sanitationId' => $sanitationId,
        //     'year' => $year,
        // ];
        // $this->dispatch('setExportFunding', $dataFunding);
    }

    // public function showFunding()
    // {
    //     dd('triggered');
    //     $this->APBDfunding = $this->finalNeighborhood->funding->where('source', 'APBD')->groupBy('type')->all();
    //     $this->APBDProvfunding = $this->finalNeighborhood->funding->where('source', 'APBD_prov')->groupBy('type')->all();
    //     $this->APBNfunding = $this->finalNeighborhood->funding->where('source', 'APBN')->groupBy('type')->all();
    // }

    public function render()
    {
        return view('livewire.form');
    }
}
