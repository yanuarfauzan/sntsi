<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class AreaLocation extends Component
{
    public $neighborhood;
    public $range;
    public $locationImagePath = null;
    public $negativeListMap = null;
    public function updatedRange($value)
    {
        Log::info($value);
        $range = explode('_', $value)[1] == 'Kec' ? $this->neighborhood->district->name : $this->neighborhood->village->name;
        $this->negativeListMap = 'PETA/negatif/' . $value . '_' . $range . '.jpg';
    }
    public function mount($neighborhood)
    {
        $this->neighborhood = $neighborhood;
        $this->updatedRange('Negatif_Kec');
        $this->locationImagePath = $neighborhood->village->name . '/lokasi' . '/' . $neighborhood->rw . '_' . $neighborhood->rt . '.jpg';
        $this->negativeListMap = 'PETA/negatif/Negatif_Kec_' . $neighborhood->district->name . '.jpg';
    }
    public function render()
    {
        return view('livewire.area-location');
    }
}
