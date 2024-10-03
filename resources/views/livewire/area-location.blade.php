<div class="container-fluid mt-2">
    <div class="row mb-4">
        <div class="d-flex flex-column flex-sm-row justify-content-start align-items-start gap-4">
            <div class="d-flex flex-column justify-content-start align-items-start mt-2 gap-4 bg-main w-50"
                style="height: auto;">
                <div
                    class="container-fluid d-flex flex-column flex-sm-row justify-content-between align-items-center w-100">
                    <div class="d-flex justify-content-start align-items-center w-25 gap-4 w-100">
                        <label for="exampleSelect">jangkauan</label>
                        <select class="form-select w-100" id="exampleSelect" wire:model.lazy="range">
                            <option value="Negatif_Kec">kecamatan</option>
                            <option value="Negatif_Kel">kelurahan</option>
                        </select>
                    </div>
                </div>
                @if (Storage::disk('public')->exists($negativeListMap))
                    <div class="mask-custom">
                        <img src="{{ Storage::url($negativeListMap) }}" alt="Map Image" class="rounded"
                            style="width: 565px;";>
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
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6">KECAMATAN:</div>
                            <div class="col-6 text-end">
                                {{ $neighborhood->district->name ?? null }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">KELURAHAN:</div>
                            <div class="col-6 text-end">{{ $neighborhood->village->name ?? null }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">KAWASAN:</div>
                            <div class="col-6 text-end">{{ $neighborhood->housing ?? null }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">RW:</div>
                            <div class="col-6 text-end">{{ $neighborhood->rw ?? null }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">RT:</div>
                            <div class="col-6 text-end">{{ $neighborhood->rt ?? null }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-start align-items-start gap-4 w-50">
                <div class="card w-100">
                    <div class="card-body">
                        <div>
                            <strong>Pendanaan</strong>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">APBD:</div>
                            <div class="col-6 text-end">N/A</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">APBD PROVINSI:</div>
                            <div class="col-6 text-end">N/A</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">APBN:</div>
                            <div class="col-6 text-end">N/A</div>
                        </div>
                    </div>
                </div>
                <div class="bg-component card d-flex flex-column align-items-end gap-2 w-100 box-gambar">
                    @if (Storage::disk('public')->exists($locationImagePath))
                        <div class="w-100 border-component">
                            <img src="{{ Storage::url($locationImagePath) }}" class="w-100 h-100" alt="gambar lokasi">
                        </div>
                    @else
                        <div class="w-100 border-component mask-custom">
                            <img src="{{ Storage::url('empty_image.jpg') }}" class="w-100 h-100" alt="gambar lokasi" id="map">
                            <div class="overlay">
                                <p class="centered-text text-dark">gambar belum tersedia</p>
                            </div>
                        </div>
                    @endif

                </div>
                {{-- <div class="d-flex flex-column align-items-start w-100 mt-2">
                        <span><strong>KEGIATAN</strong></span>
                        <span class="text-component"><strong>PEMINDAHAN SUTET</strong></span>
                        <span><strong>CAPAIAN</strong></span>
                        <span class="text-component"><strong>SELESAI</strong></span>
                    </div>
                    <div class="bg-white border-component w-100 box-gambar" style="height: 325px;">
                        <canvas id="neighborhoodChart"></canvas>
                    </div> --}}
            </div>
        </div>
        <style>
            @media (max-width: 576px) {
                .w-50 {
                    width: 100% !important;
                }
            }
        </style>
        <script>
            const ctxNegativeList = document.getElementById('neighborhoodChart').getContext('2d');
            new Chart(ctxNegativeList, {
                type: 'pie',
                data: {
                    labels: @json($chartDataNegativeList['labels'] ?? []),
                    datasets: [{
                        label: '# of Votes',
                        data: @json($chartDataNegativeList['values'] ?? []),
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
        </script>
