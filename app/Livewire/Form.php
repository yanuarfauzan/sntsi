<?php

namespace App\Livewire;

use Livewire\Component;

class Form extends Component
{
    public $listeners = ['setDataFromImport'];

    public function mount($districts)
    {
        $this->districts = $districts;
    }
    public function setDataFromImport($neighborhood)
    {
        $this->dispatch('setData', $neighborhood);
    }

    public function render()
    {
        return view('livewire.form');
    }
}
