<?php

namespace App\Livewire;

use Livewire\Component;

class ModalsSanitation extends Component
{
    public $cublukImagePath = null;
    public $septitankImagePath = null;
    public $ipalImagePath = null;
    public $noMckImagePath = null;
    public $noSeptitankImagePath = null;

    public $listeners = ['getNoSeptitankImagePath', 'getNoMckImagePath', 'getCublukImagePath', 'getSeptitankImagePath', 'getIpalImagePath'];
    public function getCublukImagePath($cublukImagePath)
    {
        $this->cublukImagePath = $cublukImagePath;
    }
    public function getSeptitankImagePath($septitankImagePath)
    {
        $this->septitankImagePath = $septitankImagePath;
    }
    public function getNoSeptitankImagePath($noSeptitankImagePath)
    {
        $this->noSeptitankImagePath = $noSeptitankImagePath;
    }

    public function getIpalImagePath($ipalImagePath)
    {
        $this->ipalImagePath = $ipalImagePath;
    }
    public function getNoMckImagePath($noMckImagePath)
    {
        $this->noMckImagePath = $noMckImagePath;
    }

    public function render()
    {
        return view('livewire.modals-sanitation');
    }
}
