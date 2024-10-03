    <div class="container-fluid mt-2 h-fit">
        <div class="row mb-4">
            <div class="d-flex flex-column flex-sm-row justify-content-start align-items-top gap-4">
                <div class="d-flex flex-column justify-content-start align-items-start gap-4 bg-main w-50">
                    @if ($map != null)
                        <div class="mask-custom">
                            <img src="{{ Storage::url($map) }}" alt="Map Image" class="rounded" style="width: 565px;";>
                        </div>
                    @else
                        <div class="mask-custom">
                            <img id="map" src="{{ Storage::url('PETA/administrasi/BANYUMANIK.jpg') }}"
                                alt="Empty Image" class="rounded">
                            <div class="overlay">
                                <p class="centered-text text-dark">lokasi belum diatur</p>
                            </div>
                        </div>
                    @endif
                    <div class="bg-main card w-100">
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
                                    <strong>JUMLAH RUMAH:</strong>
                                </div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->number_of_houses ?? 0 }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-sm-row justify-content-column align-items-start mt-2 gap-4 bg-main w-50 box-gambar"
                    style="height: 50%;">
                    <div class="d-flex flex-column justify-content-start align-items-center gap-4 w-50">
                        <div class="card bg-main w-100 p-4">
                            <div class="row mb-2">
                                <div class="col-12"><strong>Terlayani Sanitasi</strong></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">Cubluk: {{ $finalNeighborhood->sanitation->latrine ?? 0 }}</div>
                                <div class="col-6 text-end">
                                    <button class="badge badge-success border-0" wire:click="setFund('cubluk')"
                                        role="button"><i class="fas fa-coins"></i></button>
                                    <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                        data-mdb-target="#cubluk" role="button"><i class="fas fa-image"></i></a>
                                    <button class="badge badge-warning border-0" id="railMap">
                                        <i class="fas fa-map"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="railMap">
                                        <li><a wire:click="setTypeMap('Cubluk_Kel')" class="dropdown-item"
                                                href="#">Se
                                                Kecamatan</a></li>
                                        <li><a wire:click="setTypeMap('Cubluk_Kec')" class="dropdown-item"
                                                href="#">Se
                                                Kelurahan</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7 pe-0">Tangki Septic:
                                    {{ $finalNeighborhood->sanitation->septic_tank ?? 0 }}</div>
                                <div class="col-5 text-end ps-0">
                                    <button class="badge badge-success border-0" wire:click="setFund('septitank')"
                                        role="button"><i class="fas fa-coins"></i></button>
                                    <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                        data-mdb-target="#septitank" role="button"><i class="fas fa-image"></i></a>
                                    <button class="badge badge-warning border-0" id="railMap">
                                        <i class="fas fa-map"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="railMap">
                                        <li><a wire:click="setTypeMap('Septitank_Kel')" class="dropdown-item"
                                                href="#">Se Kecamatan</a></li>
                                        <li><a wire:click="setTypeMap('Septitank_Kec')" class="dropdown-item"
                                                href="#">Se Kelurahan</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7 pe-0">Ipal Komunal: {{ $finalNeighborhood->sanitation->ipal ?? 0 }}
                                </div>
                                <div class="col-5 text-end ps-0">
                                    <button class="badge badge-success border-0" wire:click="setFund('ipal')"
                                        role="button"><i class="fas fa-coins"></i></button>
                                    <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                        data-mdb-target="#ipal" role="button"><i class="fas fa-image"></i></a>
                                    <button class="badge badge-warning border-0" id="railMap">
                                        <i class="fas fa-map"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="railMap">
                                        <li><a wire:click="setTypeMap('Ipal_Kel')" class="dropdown-item"
                                                href="#">Se
                                                Kecamatan</a></li>
                                        <li><a wire:click="setTypeMap('Ipal_Kec')" class="dropdown-item"
                                                href="#">Se
                                                Kelurahan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-main w-100 p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><strong>Tidak Terlayani Sanitasi</strong></span>
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">Tidak memiliki MCK:
                                    {{ $finalNeighborhood->sanitation->no_toilet ?? 0 }}</div>
                                <div class="col-6 text-end">
                                    <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                        data-mdb-target="#noMck" role="button"><i class="fas fa-image"></i></a>
                                    <button class="badge badge-warning border-0" id="railMap">
                                        <i class="fas fa-map"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="railMap">
                                        <li><a wire:click="setTypeMap('MCK_Kel')" class="dropdown-item"
                                                href="#">Se
                                                Kecamatan</a></li>
                                        <li><a wire:click="setTypeMap('MCK_Kec')" class="dropdown-item"
                                                href="#">Se
                                                Kelurahan</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">Tidak memiliki septitank:
                                    {{ $finalNeighborhood->sanitation->no_septic_tank ?? 0 }}</div>
                                <div class="col-6 text-end">
                                    <a class="badge badge-info" data-mdb-ripple-init data-mdb-modal-init
                                        data-mdb-target="#noSeptitank" role="button"><i
                                            class="fas fa-image"></i></a>
                                    <button class="badge badge-warning border-0" id="railMap">
                                        <i class="fas fa-map"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="railMap">
                                        <li><a wire:click="setTypeMap('NoSeptitank_Kel')" class="dropdown-item"
                                                href="#">Se Kecamatan</a></li>
                                        <li><a wire:click="setTypeMap('NoSeptitank_Kec')" class="dropdown-item"
                                                href="#">Se Kelurahan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-white w-100 p-4">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <strong>Tidak Terlayani Sanitasi</strong>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-8">Tidak Memiliki MCK:</div>
                                <div class="col-4 text-end">
                                    {{ $finalNeighborhood->sanitation->no_toilet ?? 0 }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-8">Tidak Memiliki Septitank:</div>
                                <div class="col-4 text-end">
                                    {{ $finalNeighborhood->sanitation->no_septic_tank ?? 0 }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between align-items-start gap-4 w-50">
                        <div class="card bg-white w-100 px-4 pt-4">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <strong>Diagram sanitasi</strong>
                                </div>
                            </div>
                            <div class="card-body p-0 mb-4" style="height: 290px">
                                <canvas id="SanitationChart" style="width: 100%; height: 100%;"></canvas>
                            </div>
                        </div>
                        <div class="card bg-main w-100 p-4">
                            <div class="col-12 mb-2">
                                <strong>Pendanaan</strong>
                            </div>
                            <div class="row mb-2">
                                <div class="col-8">APBD:</div>
                                <div class="col-4 text-end">
                                    @switch($fundValue)
                                        @case('cubluk')
                                            {{ $finalNeighborhood->houses->cubluk_APBD ?? 0 }}
                                        @break

                                        @case('septitank')
                                            {{ $finalNeighborhood->houses->septitank_APBD ?? 0 }}
                                        @break

                                        @case('ipal')
                                            {{ $finalNeighborhood->houses->ipal_APBD ?? 0 }}
                                        @break
                                    @endswitch
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-8">APBD Provinsi:</div>
                                <div class="col-4 text-end">
                                    @switch($fundValue)
                                        @case('cubluk')
                                            {{ $finalNeighborhood->houses->cubluk_APBD_prov ?? 0 }}
                                        @break

                                        @case('septitank')
                                            {{ $finalNeighborhood->houses->septitank_APBD_prov ?? 0 }}
                                        @break

                                        @case('ipal')
                                            {{ $finalNeighborhood->houses->ipal_APBD_prov ?? 0 }}
                                        @break
                                    @endswitch
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">APBN</div>
                                <div class="col-4 text-end">
                                    @switch($fundValue)
                                        @case('cubluk')
                                            {{ $finalNeighborhood->houses->cubluk_APBD_prov ?? 0 }}
                                        @break

                                        @case('septitank')
                                            {{ $finalNeighborhood->houses->septitank_APBD_prov ?? 0 }}
                                        @break

                                        @case('ipal')
                                            {{ $finalNeighborhood->houses->ipal_APBD_prov ?? 0 }}
                                        @break
                                    @endswitch
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
            @livewire('modalsSanitation')
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

        document.addEventListener('livewire:init', function() {
            Livewire.on('getChartSanitation', (chart) => {
                const ctxSanitation = document.getElementById('SanitationChart').getContext('2d');
                new Chart(ctxSanitation, {
                    type: 'bar', // Chart diatur sebagai 'bar'
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
                        maintainAspectRatio: false, // Agar chart bisa menyesuaikan ukuran container-nya
                        plugins: {
                            legend: {
                                position: 'top' // Posisi legend di bagian atas
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
                                    maxRotation: 45, // Label sumbu X bisa dirotasi agar terbaca
                                    minRotation: 0
                                },
                                title: {
                                    display: true,
                                    text: 'Tidak terlayani/memiliki', // Label untuk sumbu X
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                max: Math.max(...chart[0].values) +
                                10, // Mengatur agar max pada sumbu Y lebih dari nilai maksimum
                                ticks: {
                                    stepSize: 1,
                                    callback: function(value) {
                                        if (Number.isInteger(value)) {
                                            return value; // Menampilkan hanya angka bulat
                                        }
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Jumlah Suara', // Label untuk sumbu Y
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
