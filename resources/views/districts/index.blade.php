@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/table-datatable-jquery.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Districts</h3>
                </div>
            </div>
        </div>
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered text-center" id="table2">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="4">#</th>
                                                <th class="text-center" rowspan="4">Kecamatan</th>
                                                <th class="text-center" rowspan="4">Kode</th>
                                                <th class="text-center" rowspan="4">Kelurahan</th>
                                                <th class="text-center" rowspan="4">RW</th>
                                                <th class="text-center" rowspan="4">RT</th>
                                                <th class="text-center" rowspan="4">Jumlah Kepala Rumah Tangga (KRT)</th>
                                                <th class="text-center" rowspan="4">Jumlah Kepala Keluarga (KK)</th>
                                                <th class="text-center" rowspan="4">Jumlah Penduduk</th>
                                                <th class="text-center" rowspan="4">Jumlah Rumah</th>
                                                <th class="text-center" rowspan="4">Pemukiman Kumuh (SK Kumuh)</th>
                                                <th class="text-center" colspan="13">A. Jumlah Rumah per Kelurahan</th>
                                                <th class="text-center" colspan="11">B. Air Minum</th>
                                                <th class="text-center" colspan="5">C. Sanitasi</th>
                                                <th class="text-center" rowspan="4">Pertokoan</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" colspan="8">A.1 Jenis Kawasan Lokasi Rumah Yang
                                                    Ditempati</th>
                                                <th class="text-center" rowspan="3">Rumah Kosong</th>
                                                <th class="text-center" rowspan="3">Diperuntukan Pemukiman</th>
                                                <th class="text-center" colspan="3">A.2 Kepemilikan Rumah</th>
                                                <th class="text-center" colspan="11">Sumber Air Minum</th>
                                                <th class="text-center" colspan="3">Terlayani Sanitasi</th>
                                                <th class="text-center" colspan="2">Tidak Terlayani Sanitasi</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" rowspan="2">Sempadan Rel</th>
                                                <th class="text-center" rowspan="2">Sempadan Sungai</th>
                                                <th class="text-center" rowspan="2">Sutet</th>
                                                <th class="text-center" rowspan="2">Kolong Jembatan</th>
                                                <th class="text-center" colspan="4">Rawan Bencana</th>
                                                <th class="text-center" rowspan="2">Milik Sendiri</th>
                                                <th class="text-center" rowspan="2">Bukan Milik Sendiri</th>
                                                <th class="text-center" rowspan="2">Kontrak/Sewa</th>
                                                <th class="text-center" rowspan="2">Air kemasan</th>
                                                <th class="text-center" rowspan="2">Air isi ulang</th>
                                                <th class="text-center" rowspan="2">Leding/PDAM</th>
                                                <th class="text-center" rowspan="2">Sumur bor/pompa</th>
                                                <th class="text-center" rowspan="2">Sumur terlindung</th>
                                                <th class="text-center" rowspan="2">Sumur tak terlindung</th>
                                                <th class="text-center" rowspan="2">Mata air terlindung</th>
                                                <th class="text-center" rowspan="2">Mata air tak terlindung</th>
                                                <th class="text-center" rowspan="2">Air sungai/Danau/Kolam/ Waduk</th>
                                                <th class="text-center" rowspan="2">Air hujan</th>
                                                <th class="text-center" rowspan="2">Lainnya </th>
                                                <th class="text-center" rowspan="2">Cubluk</th>
                                                <th class="text-center" rowspan="2">Tangki Septic</th>
                                                <th class="text-center" rowspan="2">Ipal Komunal</th>
                                                <th class="text-center" rowspan="2">Tidak Memiliki MCK</th>
                                                <th class="text-center" rowspan="2">Tidak Memiliki Septitank</th>
                                            </tr>

                                            <tr>
                                                <th class="text-center">Banjir</th>
                                                <th class="text-center">Rob</th>
                                                <th class="text-center">Tanah Longsor</th>
                                                <th class="text-center">Lainnya</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        let customized_datatable = $("#table2").DataTable({
            ordering: [2],
            // pageLength: -1,
            paginate: false,
            ajax: {
                url: "{{ url('api/districts') }}",
                dataSrc: "data"
            },
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: "name"
                },
                {
                    data: "code"
                },
                {
                    data: "number_of_villages"
                },
                {
                    data: "rw"
                },
                {
                    data: "rt"
                },
                {
                    data: "krt"
                },
                {
                    data: "kk"
                },
                {
                    data: "population"
                },
                {
                    data: "number_of_houses"
                },
                {
                    data: "is_slum",
                    render: function(data, type, row, meta) {
                        return data ? 'Ya' : '';
                    }
                },
                {
                    data: "houses.location.rail",
                },
                {
                    data: "houses.location.river",
                },
                {
                    data: "houses.location.sutet",
                },
                {
                    data: "houses.location.bridge",
                },
                {
                    data: "houses.location.disaster_prone.flood",
                },
                {
                    data: "houses.location.disaster_prone.tidal_flood",
                },
                {
                    data: "houses.location.disaster_prone.landslide",
                },
                {
                    data: "houses.location.disaster_prone.other",
                },
                {
                    data: "houses.vacant_house",
                },
                {
                    data: "houses.for_settlement",
                },
                {
                    data: "houses.ownership.owned",
                },
                {
                    data: "houses.ownership.not_owned",
                },
                {
                    data: "houses.ownership.lease",
                },
                {
                    data: "water.bottled_water"
                },
                {
                    data: "water.refill_water"
                },
                {
                    data: "water.piped_water_supply"
                },
                {
                    data: "water.drilled_well"
                },
                {
                    data: "water.protected_well"
                },
                {
                    data: "water.unprotected_well"
                },
                {
                    data: "water.protected_spring"
                },
                {
                    data: "water.unprotected_spring"
                },
                {
                    data: "water.nature"
                },
                {
                    data: "water.rainwater"
                },
                {
                    data: "water.other"
                }, 
                {
                    data: "sanitation.sanitation_coverage.latrine"
                },
                {
                    data: "sanitation.sanitation_coverage.septic_tank"
                },
                {
                    data: "sanitation.sanitation_coverage.ipal"
                },
                {
                    data: "sanitation.unserved_sanitation.no_toilet"
                },
                {
                    data: "sanitation.unserved_sanitation.no_septic_tank"
                },
                {
                    data: "stores"
                }
            ],
            responsive: true,
            dom: "<'row'<'col-3'l><'col-9'f>>" +
                "<'row dt-row'<'col-sm-12'tr>>" +
                "<'row'<'col-4'i><'col-8'p>>",
            "language": {
                "info": "Page _PAGE_ of _PAGES_",
                "lengthMenu": "_MENU_ ",
                "search": "",
                "searchPlaceholder": "Search.."
            }
        })
    </script>
@endpush
