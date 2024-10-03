<?php

namespace App\Livewire;

use Livewire\Component;

class Modals extends Component
{
    public $floodImagePaths = [];
    public $landslideImagePaths = [];
    public $riverImagePaths = [];
    public $sutetImagePath = null;
    public $RailImagePath = null;
    public $bridgeImagePath = null;
    public $robImagePath = null;
    public $ipalImagePath = null;
    public $cublukImagePath = null;
    public $septitankImagePath = null;
    public $noSeptitankImagePath = null;
    public $noMckImagePath = null;
    public $listeners = [
        'getFloodImagePaths', 
        'getLandslideImagePaths',
        'getRiverImagePaths',
        'getSutetImagePath',
        'getRailImagePath',
        'getBridgeImagePath',
        'getRobImagePath',
        'getNoSeptitankImagePath',
        'getIpalImagePath',
        'getSeptitankImagePath',
        'getNoMckImagePath',
        'getCublukImagePath'
    ];

    public function getFloodImagePaths($floodImagePaths)
    {
        $this->floodImagePaths = $floodImagePaths;
    }

    public function getSutetImagePath($sutetImagePath)
    { 
        $this->sutetImagePath = $sutetImagePath;
    }

    public function getLandslideImagePaths($landslideImagePaths)
    {
        $this->landslideImagePaths = $landslideImagePaths;
    }
    public function getRiverImagePaths($riverImagePaths)
    {
        $this->riverImagePaths = $riverImagePaths;
    }
    public function getRailImagePath($railImagePath)
    {
        $this->RailImagePath = $railImagePath;
    }
    public function getBridgeImagePath($bridgeImagePath)
    {
        $this->bridgeImagePath = $bridgeImagePath;
    }
    public function getRobImagePath($robImagePath)
    {
        $this->robImagePath = $robImagePath;
    }
    public function render()
    {
        return view('livewire.modals');
    }
}
