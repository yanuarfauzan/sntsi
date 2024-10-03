@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/table-datatable-jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Neighborhood</h3>
                </div>
            </div>
        </div>
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h6>District</h6>
                        <div class="form-group">
                            <select id="select-district" class="choices form-select">
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <h6>Village</h6>
                        <div class="form-group">
                            <select id="select-village" class="choices form-select">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="table2">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="2">distirct id</th>
                                                <th class="text-center" rowspan="2">village id</th>
                                                <th class="text-center" rowspan="2">#</th>
                                                <th class="text-center" rowspan="2">Kecamatan</th>
                                                <th class="text-center" rowspan="2">Kelurahan</th>
                                                <th class="text-center" rowspan="2">Nama Perumahan</th>
                                                <th class="text-center" rowspan="2">RW</th>
                                                <th class="text-center" rowspan="2">RT</th>
                                                <th class="text-center" rowspan="2">Jumlah Kepala Rumah Tangga (KRT)</th>
                                                <th class="text-center" rowspan="2">Jumlah Kepala Keluarga (KK)</th>
                                                <th class="text-center" rowspan="2">Jumlah Penduduk</th>
                                                <th class="text-center" rowspan="2">Nama Foto Lokasi (Negatif List)</th>
                                                <th class="text-center" colspan="2">GPS Lokasi (Negatif List)</th>
                                                <th class="text-center" rowspan="2">Pemukiman Kumuh ( SK Kumuh )</th>
                                                <th class="text-center" rowspan="2">Diperuntukan Untuk Pemukiman</th>
                                                <th class="text-center" rowspan="2">Rumah Kosong</th>
                                                <th class="text-center" rowspan="2">Jumlah Rumah</th>
                                                <th class="text-center" rowspan="2">Pertokoan</th>
                                                <th class="text-center" rowspan="2">Action</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Latitude</th>
                                                <th class="text-center">Longtitude</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($neighborhoods as $neighborhood)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $neighborhood->district->name }}</td>
                                                    <td class="text-center">{{ $neighborhood->village->name }}</td>
                                                    <td class="text-center">{{ $neighborhood->housing }}</td>
                                                    <td class="text-center">
                                                        {{ str_pad($neighborhood->rw, 3, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="text-center">
                                                        {{ str_pad($neighborhood->rt, 3, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="text-center">{{ $neighborhood->krt }}</td>
                                                    <td class="text-center">{{ $neighborhood->kk }}</td>
                                                    <td class="text-center">{{ $neighborhood->population }}</td>
                                                    <td class="text-center">{{ $neighborhood->negative_list->name ?? '' }}
                                                    </td>
                                                    <td class="text-center">{{ $neighborhood->negative_list->lat ?? '' }}
                                                    </td>
                                                    <td class="text-center">{{ $neighborhood->negative_list->long ?? '' }}
                                                    </td>
                                                    <td class="text-center">{{ $neighborhood->is_slum ? 'Ya' : '' }}</td>
                                                    <td class="text-center">
                                                        {{ $neighborhood->house->for_settlement ?? '' }}</td>
                                                    <td class="text-center">{{ $neighborhood->house->vacant_house ?? '' }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $neighborhood->house->number_of_houses ?? '' }}</td>
                                                    <td class="text-center">{{ $neighborhood->house->stores ?? '' }}</td>
                                                    <td>
                                                        <a href="{{ url('neighborhoods', $neighborhood->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
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
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>

    <script>
        const customized_datatable = $("#table2").DataTable({
            responsive: true,
            sDom: 'lrtip',
            ordering: false,
            pageLength: 100,
            ajax: {
                url: "{{ url('api/neighborhoods') }}",
                dataSrc: "data"
            },
            columns: [{
                    data: "district_id",
                    visible: false
                },
                {
                    data: "village_id",
                    visible: false
                },
                {
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: "text-center",
                },
                {
                    data: "district.name",
                    className: "text-center",
                },
                {
                    data: "village.name",
                    className: "text-center",
                },
                {
                    data: "housing",
                    className: "text-center",
                },
                {
                    data: "rw",
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return data.toString().padStart(3, '0');
                    }
                },
                {
                    data: "rt",
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return data.toString().padStart(3, '0');
                    }
                },
                {
                    data: "krt",
                    className: "text-center",
                },
                {
                    data: "kk",
                    className: "text-center",
                },
                {
                    data: "population",
                    className: "text-center",
                },
                {
                    data: "negative_list.name",
                    className: "text-center",
                },
                {
                    data: "negative_list.lat",
                    className: "text-center",
                },
                {
                    data: "negative_list.long",
                    className: "text-center",
                },
                {
                    data: "is_slum",
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return data ? "Ya" : "";
                    }
                },
                {
                    data: "house.for_settlement",
                    className: "text-center",
                },
                {
                    data: "house.vacant_house",
                    className: "text-center",
                },
                {
                    data: "number_of_houses",
                    className: "text-center",
                },
                {
                    data: "house.stores",
                    className: "text-center",
                },
                {
                    data: "id",
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return "<a href='{{ url('neighborhoods') }}/" + data +
                            "' class = 'btn btn-sm btn-primary'>Edit</a>"
                    }
                },
            ],
            dom: "<'row'<'col-3'l><'col-9'f>>" +
                "<'row dt-row'<'col-sm-12'tr>>" +
                "<'row'<'col-4'i><'col-8'p>>",
            "language": {
                "info": "Page _PAGE_ of _PAGES_",
                "lengthMenu": "_MENU_ ",
                "search": "",
                "searchPlaceholder": "Search.."
            }
        });

        var districts = new Choices('#select-district', {
            allowHTML: true,
            removeItemButton: true,
            position: 'bottom'
        });

        var villages = new Choices('#select-village', {
            allowHTML: false,
            removeItemButton: true,
            position: 'bottom'
        });

        districts.passedElement.element.addEventListener('change', function(e) {
            villages.destroy();
            customized_datatable.columns(0).search("^" + e.detail.value + "$", true, false).draw();
            console.log('district', e.detail.value);
            if (e.detail.value) {
                villages.init();
                villages.setChoices(function(callback) {
                    return fetch(
                            "{{ url('api/list-villages') }}/" + e.detail.value
                        )
                        .then(function(res) {
                            return res.json();
                        })
                        .then(function(data) {
                            return data.data.map(function(village) {
                                return {
                                    label: village.name,
                                    value: village.id
                                };
                            });
                        });
                });
            }
        });

        villages.passedElement.element.addEventListener('change', function(e) {
            customized_datatable.columns(1).search("^" + e.detail.value + "$", true, false).draw();
            console.log('village', e.detail.value);
        });
    </script>
@endpush
