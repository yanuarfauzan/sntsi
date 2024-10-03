<div class="container-fluid mt-2">
    <div class="row mb-4">
        <div>
            <div style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100vh;">
                @if ($map != null)
                    @if (Storage::disk('public')->exists($map))
                        <div style="text-align: center;">
                            <img src="{{ public_path('storage/' . $map) }}" alt="Map Image" class="rounded"
                                style="width: 565px;">
                        </div>
                    @else
                        <div style="text-align: center; position: relative;">
                            <img id="map" src="{{ public_path('storage/PETA/administrasi/BANYUMANIK.jpg') }}"
                                alt="Empty Image" class="rounded" style="width: 565px;">
                            <div
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                                <p class="text-dark" style="font-weight: bold;">peta belum tersedia</p>
                            </div>
                        </div>
                    @endif
                @else
                    <div style="text-align: center; position: relative;">
                        <img id="map" src="{{ public_path('storage/PETA/administrasi/BANYUMANIK.jpg') }}"
                            alt="Empty Image" class="rounded" style="width: 565px;">
                        <div
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                            <p class="text-dark" style="font-weight: bold;">lokasi belum diatur</p>
                        </div>
                    </div>
                @endif
            </div>
            <table style="width: 100%; margin-top: 24px; border-collapse: collapse; border-spacing: 16px;">
                <tr>
                    <!-- Kolom 1 -->
                    <td
                        style="width: 45%; background-color: #f8f9fa; border-radius: 8px; border: 1px solid #ddd; padding: 16px; box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);">
                        <table style="width: 100%;">
                            <tr>
                                <td><strong>KECAMATAN:</strong></td>
                                <td style="text-align: right;">{{ $neighborhood->district->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>KELURAHAN:</strong></td>
                                <td style="text-align: right;">{{ $neighborhood->village->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>KAWASAN:</strong></td>
                                <td style="text-align: right;">{{ $neighborhood->housing ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>RW:</strong></td>
                                <td style="text-align: right;">{{ $neighborhood->rw ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>RT:</strong></td>
                                <td style="text-align: right;">{{ $neighborhood->rt ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Jumlah rumah:</strong></td>
                                <td style="text-align: right;">{{ $neighborhood->number_of_houses ?? 0 }}</td>
                            </tr>
                        </table>
                    </td>

                    <td style="width: 10%;"></td>

                    <!-- Kolom 2 -->
                    <td
                        style="width: 45%; background-color: #f8f9fa; border-radius: 8px; border: 1px solid #ddd; padding: 16px; box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);">
                        <table style="width: 100%;">
                            <tr>
                                <td colspan="2"><strong>Kepemilikan rumah</strong></td>
                            </tr>
                            <tr>
                                <td>Milik sendiri:</td>
                                <td style="text-align: right;">{{ $neighborhood->houses->owned ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Bukan milik sendiri:</td>
                                <td style="text-align: right;">{{ $neighborhood->houses->not_owned ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Kontrak/sewa:</td>
                                <td style="text-align: right;">{{ $neighborhood->houses->lease ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Pertokoan:</td>
                                <td style="text-align: right;">{{ $neighborhood->houses->stores ?? 0 }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="d-flex flex-column gap-4 justify-content-center align-items-start w-50">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start gap-4 w-100">
                <!-- Kawasan negatif list -->
                <table style="width: 100%; margin-top: 24px; border-collapse: collapse; border-spacing: 16px;">
                    <tr>
                        <td
                            style="width: 45%; background-color: #f8f9fa; border-radius: 8px; border: 1px solid #ddd; padding: 16px; box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);">
                            <table style="width: 100%;">
                                <tr>
                                    <td colspan="2"><strong>Kawasan negatif list</strong></td>
                                </tr>
                                <tr>
                                    <td>Sepadan Rel</td>
                                    <td style="text-align: right;">{{ $neighborhood->houses->rail ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td>Sepadan Sungai</td>
                                    <td style="text-align: right;">{{ $neighborhood->houses->river ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td>Sutet</td>
                                    <td style="text-align: right;">{{ $neighborhood->houses->sutet ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td>Kol Jembatan</td>
                                    <td style="text-align: right;">{{ $neighborhood->houses->bridge ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td>Rumah Kosong</td>
                                    <td style="text-align: right;">{{ $neighborhood->houses->vacant_house ?? 0 }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 10%"></td>
                        <td
                            style="width: 45%; background-color: #f8f9fa; border-radius: 8px; border: 1px solid #ddd; padding: 16px; box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);">
                            <table style="width: 100%;">
                                <tr>
                                    <td colspan="2"><strong>Kawasan rawan bencana</strong></td>
                                </tr>
                                <tr>
                                    <td>Banjir</td>
                                    <td style="text-align: right;">{{ $neighborhood->houses->flood ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td>Rob</td>
                                    <td style="text-align: right;">{{ $neighborhood->houses->tidal_flood ?? 0 }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanah Longsor</td>
                                    <td style="text-align: right;">{{ $neighborhood->houses->landslide ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td>Lainnya</td>
                                    <td style="text-align: right;">{{ $neighborhood->negative_list->other ?? 0 }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
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
            map.style.height = '100%';
        } else {
            map.style.height = '400px';
        }
    })
    document.addEventListener('DOMContentLoaded', function() {
        var map = document.getElementById('map');
        if (window.innerWidth <= 768) {
            map.style.height = '50%';
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
