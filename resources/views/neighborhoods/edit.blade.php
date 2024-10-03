@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">

    <style>
        @media (min-width: 30em) {
            .filepond--item {
                width: calc(50% - 0.5em);
            }
        }

        @media (min-width: 50em) {
            .filepond--item {
                width: calc(33.33% - 0.5em);
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update Neighborhood</h3>
                </div>
            </div>
        </div>
        <section class="row mb-4">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.validation-errors')

                        <form action="{{ url('neighborhoods', $neighborhood->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5>
                                                            Neighborhood
                                                        </h5>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="village_id">Kelurahan</label>
                                                            <select id="village_id" name="village_id"
                                                                class="choices form-select">
                                                                @foreach ($villages as $village)
                                                                    <option value="{{ $village->id }}"
                                                                        {{ $neighborhood->village_id == $village->id ? 'selected' : '' }}>
                                                                        {{ $village->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="district_id">Kecamatan</label>
                                                            <select id="district_id" name="district_id"
                                                                class="choices form-select">
                                                                @foreach ($districts as $district)
                                                                    <option value="{{ $district->id }}"
                                                                        {{ $neighborhood->district_id == $district->id ? 'selected' : '' }}>
                                                                        {{ $district->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="housing">Nama Perumahaan</label>
                                                            <input type="text" id="housing" class="form-control"
                                                                placeholder="Nama Perumahaan" name="housing"
                                                                value="{{ $neighborhood->housing }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="rw">RW</label>
                                                                    <input type="number" id="rw"
                                                                        class="form-control" name="rw"
                                                                        value="{{ $neighborhood->rw }}" placeholder="RW">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="rt">RT</label>
                                                                    <input type="number" id="rt"
                                                                        class="form-control" name="rt"
                                                                        value="{{ $neighborhood->rt }}" placeholder="RT">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="krt">Jumlah Kepala Rumah Tangga
                                                                (KRT)</label>
                                                            <input type="number" id="krt" class="form-control"
                                                                name="krt" value="{{ $neighborhood->krt }}"
                                                                placeholder="Jumlah Kepala Rumah Tangga (KRT)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="kk">Jumlah Kepala Keluarga (KK)</label>
                                                            <input type="number" id="kk" class="form-control"
                                                                name="kk" value="{{ $neighborhood->kk }}"
                                                                placeholder="Jumlah Kepala Keluarga (KK)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="population">Jumlah Penduduk</label>
                                                            <input type="number" id="population" class="form-control"
                                                                name="population" value="{{ $neighborhood->population }}"
                                                                placeholder="Jumlah Penduduk">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="negative_list.name">Nama Foto Lokasi (Negatif
                                                                List)</label>
                                                            <input type="text" id="negative_list.name"
                                                                class="form-control" name="negative_list[name]"
                                                                placeholder="Nama Foto Lokasi (Negatif List)"
                                                                value="{{ $neighborhood->negative_list->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="negatove_list.lat">GPS Lokasi -
                                                                        Latitude</label>
                                                                    <input type="text" id="negatove_list.lat"
                                                                        class="form-control" name="negative_list[lat]"
                                                                        placeholder="GPS Lokasi Negatif List -
                                                                            Latitude"
                                                                        value="{{ $neighborhood->negative_list->lat }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="negative_list.long">GPS Lokasi -
                                                                        Longtitude</label>
                                                                    <input type="text" id="negative_list.long"
                                                                        class="form-control" name="negative_list[long]"
                                                                        placeholder="GPS Lokasi Negatif List -
                                                                            Longtitude"
                                                                        value="{{ $neighborhood->negative_list->long }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <div class='form-check'>
                                                            <div class="checkbox">
                                                                <input type="checkbox" name="is_slum" id="is_slum"
                                                                    class='form-check-input'
                                                                    {{ $neighborhood->is_slum ? 'checked' : '' }}>
                                                                <label for="is_slum">Pemukiman Kumuh (SK Kumuh)</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="house.for_settlement">Diperuntukan Untuk
                                                                Pemukiman</label>
                                                            <input type="number" id="house.for_settlement"
                                                                class="form-control" name="house[for_settlement]"
                                                                value="{{ $neighborhood->house->for_settlement }}"
                                                                placeholder="Diperuntukan Untuk Pemukiman">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="form-group">
                                                            <label for="house.vacant_house">Rumah Kosong</label>
                                                            <input type="number" id="house.vacant_house"
                                                                class="form-control" name="house[vacant_house]"
                                                                value="{{ $neighborhood->house->vacant_house }}"
                                                                placeholder="Rumah Kosong">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="form-group">
                                                            <label for="number_of_houses">Jumlah Rumah</label>
                                                            <input type="number" id="number_of_houses"
                                                                class="form-control" name="number_of_houses"
                                                                placeholder="Jumlah Rumah"
                                                                value="{{ $neighborhood->number_of_houses }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="form-group">
                                                            <label for="house.stores">Pertokoan</label>
                                                            <input type="number" id="house.stores" class="form-control"
                                                                name="house[stores]" placeholder="Jumlah Rumah">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5>A. Jumlah Rumah Per Kelurahan</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>
                                                            A.1 Jenis Kawasan Lokasi Rumah Yang Ditempati
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="house.rail">Sempadan Rel</label>
                                                            <input type="number" id="house.rail" class="form-control"
                                                                placeholder="Sempadan Rel" name="house[rail]"
                                                                value="{{ $neighborhood->house->rail }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="house.river">Sempadan Sungai</label>
                                                            <input type="number" id="house.river" class="form-control"
                                                                placeholder="Sempadan Sungai" name="house[river]"
                                                                value="{{ $neighborhood->house->river }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="house.sutet">Sutet</label>
                                                            <input type="number" id="house.sutet" class="form-control"
                                                                placeholder="Sutet" name="house[sutet]"
                                                                value="{{ $neighborhood->house->sutet }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="house.bridge">Kolong Jembatan</label>
                                                            <input type="number" id="house.bridge" class="form-control"
                                                                placeholder="Kolong Jembatan" name="house[bridge]"
                                                                value="{{ $neighborhood->house->bridge }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6>
                                                            Rawan Bencana
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="house.flood">Banjir</label>
                                                            <input type="number" id="house.flood" class="form-control"
                                                                placeholder="Banjir" name="house[flood]"
                                                                value="{{ $neighborhood->house->flood }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="house.tidal_flood">Rob</label>
                                                            <input type="number" id="house.tidal_flood"
                                                                class="form-control" placeholder="Rob"
                                                                name="house[tidal_flood]"
                                                                value="{{ $neighborhood->house->tidal_flood }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="house.landslide">Tanah Longsor</label>
                                                            <input type="number" id="house.landslide"
                                                                class="form-control" placeholder="Tanah Longsor"
                                                                name="house[landslide]"
                                                                value="{{ $neighborhood->house->landslide }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="house.other">Lainnya</label>
                                                            <input type="number" id="house.other" class="form-control"
                                                                placeholder="Lainnya" name="house[other]"
                                                                value="{{ $neighborhood->house->other }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6>
                                                            A.2 Kepemilikan Rumah
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="house.owned">Milik Sendiri</label>
                                                            <input type="number" id="house.owned" class="form-control"
                                                                placeholder="Milik Sendiri" name="house[owned]"
                                                                value="{{ $neighborhood->house->owned }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="house.not_owned">Bukan Milik Sendiri</label>
                                                            <input type="number" id="house.not_owned"
                                                                class="form-control" placeholder="Bukan Milik Sendiri"
                                                                name="house[not_owned]"
                                                                value="{{ $neighborhood->house->not_owned }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="house.lease">Kontrak/Sewa</label>
                                                            <input type="number" id="house.lease" class="form-control"
                                                                placeholder="Kontrak/Sewa" name="house[lease]"
                                                                value="{{ $neighborhood->house->lease }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5>B. Air Minum</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>
                                                            Sumber Air Minum
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.bottled_water">Air Kemasan</label>
                                                            <input type="number" id="water.bottled_water"
                                                                class="form-control" placeholder="Air Kemasan"
                                                                name="water[bottled_water]"
                                                                value="{{ $neighborhood->water->bottled_water }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.refill_water">Air Isi Ulang</label>
                                                            <input type="number" id="water.refill_water"
                                                                class="form-control" placeholder="Air Isi Ulang"
                                                                name="water[refill_water]"
                                                                value="{{ $neighborhood->water->refill_water }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.piped_water_supply">Leding/PDAM</label>
                                                            <input type="number" id="water.piped_water_supply"
                                                                class="form-control" placeholder="Leding/PDAM"
                                                                name="water[piped_water_supply]"
                                                                value="{{ $neighborhood->water->piped_water_supply }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.drilled_well">Sumur Bor/Pompa</label>
                                                            <input type="number" id="water.drilled_well"
                                                                class="form-control" placeholder="Sumur Bor/Pompa"
                                                                name="water[drilled_well]"
                                                                value="{{ $neighborhood->water->drilled_well }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.protected_well">Sumur Terlindungi</label>
                                                            <input type="number" id="water.protected_well"
                                                                class="form-control" placeholder="Sumur Terlindungi"
                                                                name="water[protected_well]"
                                                                value="{{ $neighborhood->water->protected_well }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.unprotected_well">Sumur Tak
                                                                Terlindungi</label>
                                                            <input type="number" id="water.unprotected_well"
                                                                class="form-control" placeholder="Sumur Tak Terlindungi"
                                                                name="water[unprotected_well]"
                                                                value="{{ $neighborhood->water->unprotected_well }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.protected_spring">Mata Air
                                                                Terlindungi</label>
                                                            <input type="number" id="water.protected_spring"
                                                                class="form-control" placeholder="Mata Air Terlindungi"
                                                                name="water[protected_spring]"
                                                                value="{{ $neighborhood->water->protected_spring }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.unprotected_spring">Mata Air Tak
                                                                Terlindungi</label>
                                                            <input type="number" id="water.unprotected_spring"
                                                                class="form-control"
                                                                placeholder="Mata Air Tak Terlindungi"
                                                                name="water[unprotected_spring]"
                                                                value="{{ $neighborhood->water->unprotected_spring }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.nature">Air/Sungai/Danau/Kolam/Waduk</label>
                                                            <input type="number" id="water.nature" class="form-control"
                                                                placeholder="Air/Sungai/Danau/Kolam/Waduk"
                                                                name="water[nature]"
                                                                value="{{ $neighborhood->water->nature }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.rainwater">Air Hujan</label>
                                                            <input type="number" id="water.rainwater"
                                                                class="form-control" placeholder="Air Hujan"
                                                                name="water[rainwater]"
                                                                value="{{ $neighborhood->water->rainwater }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="water.other">Lainnya</label>
                                                            <input type="number" id="water.other" class="form-control"
                                                                placeholder="Lainnya" name="water[other]"
                                                                value="{{ $neighborhood->water->other }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5>C. Sanitasi</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>
                                                            Terlayani Sanitasi
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="sanitation.latrine">Cubluk</label>
                                                            <input type="number" id="sanitation.latrine"
                                                                class="form-control" placeholder="Cubluk"
                                                                name="sanitation[latrine]"
                                                                value="{{ $neighborhood->sanitation->latrine }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="sanitation.septic_tank">Tangki Septic</label>
                                                            <input type="number" id="sanitation.septic_tank"
                                                                class="form-control" placeholder="Tangki Septic"
                                                                name="sanitation[septic_tank]"
                                                                value="{{ $neighborhood->sanitation->septic_tank }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="sanitation.ipal">Ipal Komunal</label>
                                                            <input type="number" id="sanitation.ipal"
                                                                class="form-control" placeholder="Ipal Komunal"
                                                                name="sanitation[ipal]"
                                                                value="{{ $neighborhood->sanitation->ipal }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6>
                                                            Tidak Terlayani Sanitasi
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="sanitation.no_toilet">Tidak Memiliki MCK</label>
                                                            <input type="number" id="sanitation.no_toilet"
                                                                class="form-control" placeholder="Tidak Memiliki MCK"
                                                                name="sanitation[no_toilet]"
                                                                value="{{ $neighborhood->sanitation->no_toilet }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="sanitation.no_septic_tank">Tidak Memiliki
                                                                Septitank</label>
                                                            <input type="number" id="sanitation.no_septic_tank"
                                                                class="form-control"
                                                                placeholder="Tidak Memiliki Septitank"
                                                                name="sanitation[no_septic_tank]"
                                                                value="{{ $neighborhood->sanitation->no_septic_tank }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5>Foto</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    {{-- <div class="col-12">
                                                        <h6>
                                                            Negatif List
                                                        </h6>
                                                    </div> --}}
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="images">Foto</label>
                                                            <input type="file" id="images"
                                                                class="form-control image-preview-filepond"
                                                                name="images[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Foto</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($neighborhood->images->chunk(4) as $images)
                                <div class="row mb-2 mb-md-4 gallery">
                                    @foreach ($images as $image)
                                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                            <img class="w-100 active" src="{{ asset($image->path) }}">
                                            <form action="{{ url('neighborhoods', $neighborhood->id) . '/' . $image->id }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger w-100 rounded-0">Hapus</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script>
    <script>
        var districts = new Choices('#district_id', {
            allowHTML: true,
            removeItemButton: true,
            position: 'bottom'
        });

        var villages = new Choices('#village_id', {
            allowHTML: true,
            removeItemButton: true,
            position: 'bottom'
        });

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType,
        )

        const filepond = FilePond.create(document.querySelector(".image-preview-filepond"), {
            credits: null,
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageCrop: false,
            allowMultiple: true,
            maxFileSize: '10MB',
            acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => {
                    // Do custom type detection here and return with promise
                    resolve(type)
                }),
            storeAsFile: true,
        });
    </script>
@endpush
