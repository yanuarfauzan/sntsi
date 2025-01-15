<div class="container-fluid mt-2">
    @if (session('import'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('import') }}
        </div>
    @endif
    <div class="row mb-4">
        <div class="d-flex flex-column justify-content-between align-items-top gap-4 w-100">
            <div class="bg-main card w-100 pt-2 ps-4">
                <h4><strong>Data Kawasan</strong></h4>
            </div>
            @if ($map != null)
                @if (Storage::disk('public')->exists($map))
                    <div class="mask-custom">
                        <img src="{{ Storage::url($map) }}" alt="Map Image" class="rounded w-100">
                    </div>
                @else
                    <div class="mask-custom">
                        <img id="map" src="{{ Storage::url('PETA/administrasi/BANYUMANIK.jpg') }}"
                            alt="Empty Image" class="rounded w-100 h-100">
                        <div class="overlay w-100">
                            <p class="centered-text text-dark">peta belum tersedia</p>
                        </div>
                    </div>
                @endif
            @else
                <div class="mask-custom">
                    <img id="map" src="{{ Storage::url('PETA/administrasi/BANYUMANIK.jpg') }}" alt="Empty Image"
                        class="rounded w-100">
                    <div class="overlay w-100">
                        <p class="centered-text text-dark">lokasi belum diatur</p>
                    </div>
                </div>
            @endif
            <div class="bg-main card d-flex flex-row justify-content-between align-items-center w-100 pt-2 px-4">
                <div>
                    <h4><strong>Negatif list Per Kelurahan</strong></h4>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-start align-items-start gap-2 bg-main w-100">
                <div class="d-flex flex-column justify-content-start align-items-center w-100 gap-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-top w-100 gap-4">
                        <div class="bg-main card w-100 w-sm-25">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>KECAMATAN:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->district->name ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>KELURAHAN:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->village->name ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5">
                                        <strong>KAWASAN:</strong>
                                    </div>
                                    <div class="col-7 text-end">
                                        {{ $finalNeighborhood->housing ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>RW:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->rw ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>RT:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->rt ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>Jumlah rumah:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->number_of_houses ?? 0 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-main card w-100 w-sm-25">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <strong>Kepemilikan rumah
                                            {{ isset($finalNeighborhood->village->name) ? 'Kel. ' . $finalNeighborhood->village->name : '' }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Milik sendiri:
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $negativeList['owned'] ?? 0 }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Bukan milik sendiri:
                                    </div>
                                    <div class="col-4 text-end">
                                        {{ $negativeList['not_owned'] ?? 0 }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Kontrak/sewa:
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $negativeList['lease'] ?? 0 }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Pertokoan:
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $negativeList['stores'] ?? 0 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-main card w-100 w-sm-25">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-8">
                                        <strong>Kawasan negatif list</strong>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Sepadan Rel: {{ $negativeList['rail'] ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end">
                                        {{-- <button class="badge badge-success border-0" wire:click="setFund('rail')"
                                            role="button"><i class="fas fa-coins"></i></button> --}}
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#rail" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="railMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="railMap">
                                            <li><a wire:click="setTypeMap('SempadanRel_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('SempadanRel_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-7 pe-0">
                                        Sepadan Sungai: {{ $negativeList['river'] ?? 0 }}
                                    </div>
                                    <div class="col-5 text-end ps-0">
                                        {{-- <button class="badge badge-success border-0" wire:click="setFund('river')"
                                            role="button"><i class="fas fa-coins"></i></button> --}}
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#river" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="riverMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="riverMap">
                                            <li><a wire:click="setTypeMap('SempadanSungai_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('SempadanSungai_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 pe-0">
                                        Sutet: {{ $negativeList['sutet'] ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end ps-0">
                                        {{-- <button class="badge badge-success border-0" wire:click="setFund('sutet')"
                                            role="button"><i class="fas fa-coins"></i></button> --}}
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#sutet" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="sutetMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="sutetMap">
                                            <li><a wire:click="setTypeMap('Sutet_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('Sutet_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 pe-0">
                                        Kol Jembatan: {{ $negativeList['bridge'] ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end ps-0">
                                        {{-- <button class="badge badge-success border-0" wire:click="setFund('bridge')"
                                            role="button"><i class="fas fa-coins"></i></button> --}}
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#bridge" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="bridgeMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="bridgeMap">
                                            <li><a wire:click="setTypeMap('KolongJembatan_Kec')" class="dropdown-item"
                                                    href="#">Se Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('KolongJembatan_Kel')" class="dropdown-item"
                                                    href="#">Se Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Rumah kosong: {{ $negativeList['vacant_house'] ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-main card w-100 w-sm-25">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <strong>Kawasan rawan bencana</strong>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Banjir: {{ $negativeList['flood'] ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            data-mdb-target="#flood" role="button"><i
                                                class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="floodMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="floodMap">
                                            <li><a wire:click="setTypeMap('RawanBanjir_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('RawanBanjir_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Rob: {{ $negativeList['tidal_flood'] ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end">
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#rob" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="robMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="robMap">
                                            <li><a wire:click="setTypeMap('Rob_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('Rob_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Tanah Longsor: {{ $negativeList['landslide'] ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#landslide" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="landslideMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="landslideMap">
                                            <li><a wire:click="setTypeMap('RawanLongsor_Kec')" class="dropdown-item"
                                                    href="#">Se Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('RawanLongsor_Kel')" class="dropdown-item"
                                                    href="#">Se Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Lainnya: {{ $negativeList['other'] ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start gap-4 w-100">
                <div class="card bg-white border-component w-50 px-4 pt-4">
                    <div class="row mb-2">
                        <div class="col-12">
                            <strong>Diagram kawasan negatif list</strong>
                        </div>
                    </div>
                    <div wire:ignore class="card-body p-0 mb-4" style="height: 240px">
                        <canvas id="NegativeListChart" style="width: 100%; height: 100%;"></canvas>
                    </div>
                </div>
                <div class="card bg-white border-component w-50 px-4 pt-4">
                    <div class="row mb-2">
                        <div class="col-12">
                            <strong>Diagram kawasan Rawan Bencana</strong>
                        </div>
                    </div>
                    <div wire:ignore class="card-body p-0 mb-4" style="height: 240px">
                        <canvas id="KawasanRawanBencanaChart" style="width: 100%; height: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="bg-main card d-flex flex-row justify-content-between align-items-center w-100 pt-2 px-4">
                <div>
                    <h4><strong>Negatif list Per Rt</strong></h4>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-start align-items-start gap-2 bg-main w-100">
                <div class="d-flex flex-column justify-content-start align-items-center w-100 gap-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-top w-100 gap-4">
                        <div class="bg-main card w-100 w-sm-25">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>KECAMATAN:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->district->name ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>KELURAHAN:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->village->name ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5">
                                        <strong>KAWASAN:</strong>
                                    </div>
                                    <div class="col-7 text-end">
                                        {{ $finalNeighborhood->housing ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>RW:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->rw ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>RT:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->rt ?? '' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <strong>Jumlah rumah:</strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->number_of_houses ?? 0 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-main card w-100 w-sm-25">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <strong>Kepemilikan rumah
                                            {{ isset($finalNeighborhood->village->name) ? 'Kel. ' . $finalNeighborhood->village->name : '' }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Milik sendiri:
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->house->owned ?? 0 }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Bukan milik sendiri:
                                    </div>
                                    <div class="col-4 text-end">
                                        {{ $finalNeighborhood->house->not_owned ?? 0 }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Kontrak/sewa:
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->house->lease ?? 0 }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Pertokoan:
                                    </div>
                                    <div class="col-6 text-end">
                                        {{ $finalNeighborhood->house->stores ?? 0 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-main card w-100 w-sm-25">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-8">
                                        <strong>Kawasan negatif list</strong>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Sepadan Rel: {{ $finalNeighborhood->house->rail ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end">
                                        {{-- <button class="badge badge-success border-0" wire:click="setFund('rail')"
                                            role="button"><i class="fas fa-coins"></i></button> --}}
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#rail" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="railMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="railMap">
                                            <li><a wire:click="setTypeMap('SempadanRel_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('SempadanRel_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-7 pe-0">
                                        Sepadan Sungai: {{ $finalNeighborhood->house->river ?? 0 }}
                                    </div>
                                    <div class="col-5 text-end ps-0">
                                        {{-- <button class="badge badge-success border-0" wire:click="setFund('river')"
                                            role="button"><i class="fas fa-coins"></i></button> --}}
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#river" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="riverMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="riverMap">
                                            <li><a wire:click="setTypeMap('SempadanSungai_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('SempadanSungai_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 pe-0">
                                        Sutet: {{ $finalNeighborhood->house->sutet ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end ps-0">
                                        {{-- <button class="badge badge-success border-0" wire:click="setFund('sutet')"
                                            role="button"><i class="fas fa-coins"></i></button> --}}
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#sutet" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="sutetMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="sutetMap">
                                            <li><a wire:click="setTypeMap('Sutet_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('Sutet_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 pe-0">
                                        Kol Jembatan: {{ $finalNeighborhood->house->bridge ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end ps-0">
                                        {{-- <button class="badge badge-success border-0" wire:click="setFund('bridge')"
                                            role="button"><i class="fas fa-coins"></i></button> --}}
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#bridge" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="bridgeMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="bridgeMap">
                                            <li><a wire:click="setTypeMap('KolongJembatan_Kec')" class="dropdown-item"
                                                    href="#">Se Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('KolongJembatan_Kel')" class="dropdown-item"
                                                    href="#">Se Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Rumah kosong: {{ $finalNeighborhood->house->vacant_house ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-main card w-100 w-sm-25">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <strong>Kawasan rawan bencana</strong>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Banjir: {{ $finalNeighborhood->house->flood ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            data-mdb-target="#flood" role="button"><i
                                                class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="floodMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="floodMap">
                                            <li><a wire:click="setTypeMap('RawanBanjir_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('RawanBanjir_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Rob: {{ $finalNeighborhood->house->tidal_flood ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end">
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#rob" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="robMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="robMap">
                                            <li><a wire:click="setTypeMap('Rob_Kec')" class="dropdown-item"
                                                    href="#">Se
                                                    Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('Rob_Kel')" class="dropdown-item"
                                                    href="#">Se
                                                    Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Tanah Longsor: {{ $finalNeighborhood->house->landslide ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                        <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                            href="#landslide" role="button"><i class="fas fa-image"></i></i></a>
                                        <button wire:ignore class="badge badge-warning border-0" id="landslideMap"
                                            data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">
                                            <i class="fas fa-map"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="landslideMap">
                                            <li><a wire:click="setTypeMap('RawanLongsor_Kec')" class="dropdown-item"
                                                    href="#">Se Kecamatan</a></li>
                                            <li><a wire:click="setTypeMap('RawanLongsor_Kel')" class="dropdown-item"
                                                    href="#">Se Kelurahan</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Lainnya: {{ $finalNeighborhood->house->other ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div
                    class="bg-main card d-flex flex-column flex-sm-row justify-content-between align-items-center pt-2 ps-4 pe-4 pb-2">
                    <span class="pt-1">
                        <h5><strong>Intervensi Penanganan
                                {{ isset($finalNeighborhood->village->name) ? 'Kel. ' . $finalNeighborhood->village->name : '' }}</strong>
                        </h5>
                    </span>
                    <div>
                        <select wire:model.lazy="year" class="form-select" aria-label="Default select example">
                            <option selected>2024</option>
                            <option value="1">2023</option>
                            <option value="2">2022</option>
                            <option value="3">2021
                            </option>
                        </select>
                    </div>
                </div> --}}
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start gap-4 w-100">
                <div class="card bg-white border-component w-50 px-4 pt-4">
                    <div class="row mb-2">
                        <div class="col-12">
                            <strong>Diagram kawasan negatif list</strong>
                        </div>
                    </div>
                    <div wire:ignore class="card-body p-0 mb-4" style="height: 240px">
                        <canvas id="NegativeListChartByRw" style="width: 100%; height: 100%;"></canvas>
                    </div>
                </div>
                <div class="card bg-white border-component w-50 px-4 pt-4">
                    <div class="row mb-2">
                        <div class="col-12">
                            <strong>Diagram kawasan Rawan Bencana</strong>
                        </div>
                    </div>
                    <div wire:ignore class="card-body p-0 mb-4" style="height: 240px">
                        <canvas id="KawasanRawanBencanaChartByRw" style="width: 100%; height: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media (max-width: 576px) {
            .w-50 {
                width: 100% !important;
            }
        }
    </style>
    <div>
        @livewire('modals', key('landingHome'))
    </div>
</div>
<script>
    window.addEventListener('resize', function() {
        var map = document.getElementById('map');
        if (window.innerWidth <= 768) {
            map.style.height = '100%';
        } else {
            map.style.height = '100%';
        }
    })
    document.addEventListener('DOMContentLoaded', function() {
        var map = document.getElementById('map');
        if (window.innerWidth <= 768) {
            map.style.height = '100%';
        } else {
            map.style.height = '100%';
        }
    })
    document.addEventListener('livewire:init', () => {
        let negativeListChart = null;
        let kawasanRawanChart = null;
        let negativeListChartByRw = null;
        let kawasanRawanChartByRw = null;
        Chart.register(ChartDataLabels);

        Livewire.on('getChartDataNegativeList', (chart) => {
            const ctxNegativeList = document.getElementById('NegativeListChart').getContext('2d');

            // Registrasi plugin ChartDataLabels

            // Jika chart sudah ada, destroy terlebih dahulu
            if (negativeListChart) {
                negativeListChart.destroy();
            }

            // Membuat chart baru
            negativeListChart = new Chart(ctxNegativeList, {
                type: 'bar',
                data: {
                    labels: chart[0].labels,
                    datasets: [{
                        label: 'Jumlah Kawasan Terkena',
                        data: chart[0].values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        },
                        datalabels: {
                            color: 'white', // Warna teks
                            anchor: 'center', // Posisi label di batang
                            align: 'center', // Penyelarasan label
                            font: {
                                size: 12,
                                weight: 'bold'
                            },
                            formatter: function(value) {
                                return value; // Menampilkan nilai data
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: false,
                                maxRotation: 45,
                                minRotation: 0
                            },
                            title: {
                                display: true,
                                text: 'Kawasan Negatif list',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            max: Math.max(...chart[0].values) + 10,
                            ticks: {
                                stepSize: 1,
                                callback: function(value) {
                                    if (Number.isInteger(value)) {
                                        return value;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'jumlah yang terkena',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
        });


        Livewire.on('getChartDataKawasanRawan', (chart) => {
            const ctxKawasanRawan = document.getElementById('KawasanRawanBencanaChart').getContext(
                '2d');

            // Jika chart sudah ada, destroy terlebih dahulu
            if (kawasanRawanChart) {
                kawasanRawanChart.destroy();
            }

            // Membuat chart baru
            kawasanRawanChart = new Chart(ctxKawasanRawan, {
                type: 'bar',
                data: {
                    labels: chart[0].labels,
                    datasets: [{
                        label: 'Jumlah Rawan Bencana',
                        data: chart[0].values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        },
                        datalabels: {
                            color: 'white', // Warna teks
                            anchor: 'center', // Posisi label di batang
                            align: 'center', // Penyelarasan label
                            font: {
                                size: 12,
                                weight: 'bold'
                            },
                            formatter: function(value) {
                                return value; // Menampilkan nilai data
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: false,
                                maxRotation: 45,
                                minRotation: 0
                            },
                            title: {
                                display: true,
                                text: 'Rawan Bencana',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            max: Math.max(...chart[0].values) + 10,
                            ticks: {
                                stepSize: 1,
                                callback: function(value) {
                                    if (Number.isInteger(value)) {
                                        return value;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'jumlah yang terkena',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
        });
        Livewire.on('getChartDataNegativeListByRw', (chart) => {
            const ctxNegativeList = document.getElementById('NegativeListChartByRw').getContext('2d');

            // Jika chart sudah ada, destroy terlebih dahulu
            if (negativeListChartByRw) {
                negativeListChartByRw.destroy();
            }

            // Membuat chart baru
            negativeListChartByRw = new Chart(ctxNegativeList, {
                type: 'bar',
                data: {
                    labels: chart[0].labels,
                    datasets: [{
                        label: 'Jumlah Kawasan Terkena',
                        data: chart[0].values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: false,
                                maxRotation: 45,
                                minRotation: 0
                            },
                            title: {
                                display: true,
                                text: 'Kawasan Negatif list',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            max: Math.max(...chart[0].values) + 10,
                            ticks: {
                                stepSize: 1,
                                callback: function(value) {
                                    if (Number.isInteger(value)) {
                                        return value;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'jumlah yang terkena',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
        });

        Livewire.on('getChartDataKawasanRawanByRw', (chart) => {
            const ctxKawasanRawan = document.getElementById('KawasanRawanBencanaChartByRw').getContext(
                '2d');

            // Jika chart sudah ada, destroy terlebih dahulu
            if (kawasanRawanChartByRw) {
                kawasanRawanChartByRw.destroy();
            }

            // Membuat chart baru
            kawasanRawanChartByRw = new Chart(ctxKawasanRawan, {
                type: 'bar',
                data: {
                    labels: chart[0].labels,
                    datasets: [{
                        label: 'Jumlah Rawan Bencana',
                        data: chart[0].values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: false,
                                maxRotation: 45,
                                minRotation: 0
                            },
                            title: {
                                display: true,
                                text: 'Rawan Bencana',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            max: Math.max(...chart[0].values) + 10,
                            ticks: {
                                stepSize: 1,
                                callback: function(value) {
                                    if (Number.isInteger(value)) {
                                        return value;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'jumlah yang terkena',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
        });
    });
</script>
