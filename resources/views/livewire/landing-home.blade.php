<div class="container-fluid mt-2">
    @if (session('import'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('import') }}
        </div>
    @endif
    <div class="row mb-4">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-top gap-4 w-100">
            <div class="d-flex flex-column justify-content-start align-items-start gap-2 bg-main w-50">
                @if ($map != null)
                    @if (Storage::disk('public')->exists($map))
                        <div class="mask-custom">
                            <img src="{{ Storage::url($map) }}" alt="Map Image" class="rounded" style="width: 565px;";>
                        </div>
                    @else
                        <div class="mask-custom">
                            <img id="map" src="{{ Storage::url('PETA/administrasi/BANYUMANIK.jpg') }}"
                                alt="Empty Image" class="rounded">
                            <div class="overlay">
                                <p class="centered-text text-dark">peta belum tersedia</p>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="mask-custom">
                        <img id="map" src="{{ Storage::url('PETA/administrasi/BANYUMANIK.jpg') }}"
                            alt="Empty Image" class="rounded">
                        <div class="overlay">
                            <p class="centered-text text-dark">lokasi belum diatur</p>
                        </div>
                    </div>
                @endif
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-top w-100 gap-4 mt-3">
                    <div class="bg-main card w-50">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <strong>KECAMATAN:</strong>
                                </div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->district->name ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <strong>KELURAHAN:</strong>
                                </div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->village->name ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5">
                                    <strong>KAWASAN:</strong>
                                </div>
                                <div class="col-7 text-end">
                                    {{ $finalNeighborhood->housing ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <strong>RW:</strong>
                                </div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->rw ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    <strong>RT:</strong>
                                </div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->rt ?? 'N/A' }}
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
                    <div class="bg-main card w-50">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-8">
                                    <strong>Kepemilikan rumah</strong>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    Milik sendiri:
                                </div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->houses->owned ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-8">
                                    Bukan milik sendiri:
                                </div>
                                <div class="col-4 text-end">
                                    {{ $finalNeighborhood->houses->not_owned ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    Kontrak/sewa:
                                </div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->houses->lease ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    Pertokoan:
                                </div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->houses->stores ?? 0 }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column gap-4 justify-content-center align-items-start w-50">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start gap-4 w-100">
                    <div class="d-flex flex-column justify-content-between align-items-start gap-4 w-50">
                        <div class="bg-main card w-100">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-8">
                                        <strong>Kawasan negatif list</strong>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        Sepadan Rel: {{ $finalNeighborhood->houses->rail ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="badge badge-success border-0" wire:click="setFund('rail')"
                                            role="button"><i class="fas fa-coins"></i></button>
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
                                        Sepadan Sungai: {{ $finalNeighborhood->houses->river ?? 0 }}
                                    </div>
                                    <div class="col-5 text-end ps-0">
                                        <button class="badge badge-success border-0" wire:click="setFund('river')"
                                            role="button"><i class="fas fa-coins"></i></button>
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
                                        Sutet: {{ $finalNeighborhood->houses->sutet ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end ps-0">
                                        <button class="badge badge-success border-0" wire:click="setFund('sutet')"
                                            role="button"><i class="fas fa-coins"></i></button>
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
                                        Kol Jembatan: {{ $finalNeighborhood->houses->bridge ?? 0 }}
                                    </div>
                                    <div class="col-6 text-end ps-0">
                                        <button class="badge badge-success border-0" wire:click="setFund('bridge')"
                                            role="button"><i class="fas fa-coins"></i></button>
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
                                        Rumah kosong: {{ $finalNeighborhood->houses->vacant_house ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-main card w-100">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <strong>Kawasan rawan bencana</strong>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        Banjir: {{ $finalNeighborhood->houses->flood ?? 0 }}
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
                                        Rob: {{ $finalNeighborhood->houses->tidal_flood ?? 0 }}
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
                                        Tanah Longsor: {{ $finalNeighborhood->houses->landslide ?? 0 }}
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
                                        Lainnya: {{ $finalNeighborhood->negative_list->other ?? 0 }}
                                    </div>
                                    <div class="col-4 text-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-main d-flex flex-column align-items-start w-100 px-4 pb-5">
                            <div
                                class="d-flex flex-column flex-sm-row justify-content-between align-items-start w-100">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between align-items-center gap-2 fw-bold mt-3">
                                        Pendanaan kawasan negatif list</div>
                                    <div class="row mt-2">
                                        <div class="col">APBD:</div>
                                        <div class="col text-end">
                                            @switch($fundValue)
                                                @case('rail')
                                                    {{ $finalNeighborhood->houses->rail_APBD ?? 0 }}
                                                @break

                                                @case('river')
                                                    {{ $finalNeighborhood->houses->river_APBD ?? 0 }}
                                                @break

                                                @case('sutet')
                                                    {{ $finalNeighborhood->houses->sutet_APBD ?? 0 }}
                                                @break

                                                @case('bridge')
                                                    {{ $finalNeighborhood->houses->bridge_APBD ?? 0 }}
                                                @break
                                            @endswitch
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">APBD Provinsi:</div>
                                        <div class="col text-end">
                                            @switch($fundValue)
                                                @case('rail')
                                                    {{ $finalNeighborhood->houses->rail_APBD_prov ?? 0 }}
                                                @break

                                                @case('river')
                                                    {{ $finalNeighborhood->houses->river_APBD_prov ?? 0 }}
                                                @break

                                                @case('sutet')
                                                    {{ $finalNeighborhood->houses->sutet_APBD_prov ?? 0 }}
                                                @break

                                                @case('bridge')
                                                    {{ $finalNeighborhood->houses->bridge_APBD_prov ?? 0 }}
                                                @break
                                            @endswitch
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">APBN:</div>
                                        <div class="col text-end">
                                            @switch($fundValue)
                                                @case('rail')
                                                    {{ $finalNeighborhood->houses->rail_APBN ?? 0 }}
                                                @break

                                                @case('river')
                                                    {{ $finalNeighborhood->houses->river_APBN ?? 0 }}
                                                @break

                                                @case('sutet')
                                                    {{ $finalNeighborhood->houses->sutet_APBN ?? 0 }}
                                                @break

                                                @case('bridge')
                                                    {{ $finalNeighborhood->houses->bridge_APBN ?? 0 }}
                                                @break
                                            @endswitch
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start gap-4 w-50 h-50">
                        <div class="card bg-white border-component w-100 px-4 pt-4">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <strong>Diagram kawasan negatif list</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="NegativeListChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card bg-white border-component w-100 px-4 pt-4">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <strong>Diagram kawasan Rawan Bencana</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="KawasanRawanBencanaChart" width="400" height="215"></canvas>
                            </div>
                        </div>
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
            map.style.height = '400px';
        }
    })
    document.addEventListener('DOMContentLoaded', function() {
        var map = document.getElementById('map');
        if (window.innerWidth <= 768) {
            map.style.height = '100%';
        } else {
            map.style.height = '400px';
        }
    })
    // Chart untuk Negative List
    document.addEventListener('livewire:init', () => {
        Livewire.on('getChartDataNegativeList', (chart) => {
            const ctxNegativeList = document.getElementById('NegativeListChart').getContext('2d');
            new Chart(ctxNegativeList, {
                type: 'pie',
                data: {
                    labels: chart[0].labels,
                    datasets: [{
                        label: '# of Votes',
                        data: chart[0].values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
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
                    }
                }
            });
        });
    });

    // Chart untuk Kawasan Rawan
    document.addEventListener('livewire:init', () => {
        Livewire.on('getChartDataKawasanRawan', (chart) => {
            const ctxKawasanRawan = document.getElementById('KawasanRawanBencanaChart').getContext(
                '2d');
            new Chart(ctxKawasanRawan, {
                type: 'pie',
                data: {
                    labels: chart[0].labels,
                    datasets: [{
                        label: '# of Votes',
                        data: chart[0].values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
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
                    }
                }
            });
        })
    })
</script>
