<div class="container-fluid mt-2">
    <div class="row mb-4">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-top gap-4">
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
            </div>
            <div class="d-flex flex-column justify-content-start align-items-start mt-2 gap-4 bg-main w-50">
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
                <div class="card bg-main w-100">
                    <div class="px-4 pt-4">
                        <strong>Sumber Air Minum</strong>
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-start gap-4">
                        <div class="w-50">
                            <div class="row mb-2">
                                <div class="col-6">
                                    Air isi ulang:
                                </div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->water->refill_water ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">
                                    Leding/PDAM:
                                </div>
                                <div class=" col-6 text-end">
                                    {{ $finalNeighborhood->water->piped_water_supply ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-8">
                                    Sumur bor/pompa:
                                </div>
                                <div class="col-4 text-end">
                                    {{ $finalNeighborhood->water->drilled_well ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">Sumur terlindung:</div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->water->protected_well ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-8">Sumur tak terlindung:</div>
                                <div class="col-4 text-end">
                                    {{ $finalNeighborhood->water->unprotected_well ?? 0 }}
                                </div>
                            </div>
                        </div>
                        <div class="w-50">
                            <div class="row mb-2">
                                <div class="col-8">Mata air terlindung:</div>
                                <div class="col-4 text-end">
                                    {{ $finalNeighborhood->water->protected_spring ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-8">Mata air tak terlindung:</div>
                                <div class="col-4 text-end">
                                    {{ $finalNeighborhood->water->unprotected_spring ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-10">Sungai/Danau/Kolam/Waduk:</div>
                                <div class="col-2 text-end">
                                    {{ $finalNeighborhood->water->nature ?? 0 }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-8">Air hujan:</div>
                                <div class="col-4 text-end">{{ $finalNeighborhood->water->rainwater ?? 0 }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">Lainnya:</div>
                                <div class="col-6 text-end">
                                    {{ $finalNeighborhood->water->other ?? 0 }}
                                </div>
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
</div>
<script>
    window.addEventListener('resize', function() {
        var map = document.getElementById('map');
        if (window.innerWidth <= 768) {
            map.style.height = '300px';
        } else {
            map.style.height = '700px';
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
</script>