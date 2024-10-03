@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>City</h3>
                </div>
            </div>
        </div>
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">Kecamatan</div>
                            <div class="col-3">: {{ $city->number_of_districts }}</div>
                        </div>
                        <div class="row">
                            <div class="col-8">Kelurahan</div>
                            <div class="col-3">: {{ $city->number_of_villages }}</div>
                        </div>
                        <div class="row">
                            <div class="col-8">RW</div>
                            <div class="col-3">: {{ $city->rw }}</div>
                        </div>
                        <div class="row">
                            <div class="col-8">RT</div>
                            <div class="col-3">: {{ $city->rt }}</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 fw-bold">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-8">Jumlah Rumah</div>
                            <div class="col-2">: {{ $city->number_of_houses }}</div>
                            <div class="col-2 text-left">Unit</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Kawasan Negatif List</div>
                            <div class="col-4">Sempadan Rel</div>
                            <div class="col-2">: {{ $city->houses->negative_list->rail }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Sempadan Sungai</div>
                            <div class="col-2">: {{ $city->houses->negative_list->river }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Sutet</div>
                            <div class="col-2">: {{ $city->houses->negative_list->sutet }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Kolong Jembatan</div>
                            <div class="col-2">: {{ $city->houses->negative_list->bridge }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">Kawasan Rawan Bencana</div>
                            <div class="col-4">Banjir</div>
                            <div class="col-2">: {{ $city->houses->disaster_prone->flood }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Rob</div>
                            <div class="col-2">: {{ $city->houses->disaster_prone->tidal_flood }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Tanah Longsor</div>
                            <div class="col-2">: {{ $city->houses->disaster_prone->landslide }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Lainnya</div>
                            <div class="col-2">: {{ $city->houses->disaster_prone->other }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">Rumah Kosong</div>
                            <div class="col-2">: {{ $city->vacant_house }}</div>
                            <div class="col-2 text-left">Unit</div>
                        </div>

                        <div class="row">
                            <div class="col-8">Diperuntukan Untuk Pemukiman</div>
                            <div class="col-2">: {{ $city->for_settlement }}</div>
                            <div class="col-2 text-left">Unit</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">Kepemilikan rumah</div>
                            <div class="col-4">Milik Sendiri</div>
                            <div class="col-2">: {{ $city->ownership->owned }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Bukan Milik Sendiri</div>
                            <div class="col-2">: {{ $city->ownership->not_owned }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Kontrak/Sewa</div>
                            <div class="col-2">: {{ $city->ownership->lease }}</div>
                            <div class="col-2 text-left">Rumah</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Pertokoan</div>
                            <div class="col-2">: {{ $city->ownership->stores }}</div>
                            <div class="col-2 text-left">Unit</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 fw-bold">Air Minum</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Sumber Air Minum</div>
                            <div class="col-4">Air kemasan</div>
                            <div class="col-2">: {{ $city->water->bottled_water }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Air isi ulang</div>
                            <div class="col-2">: {{ $city->water->refill_water }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Leding/PDAM</div>
                            <div class="col-2">: {{ $city->water->piped_water_supply }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Sumur bor/pompa</div>
                            <div class="col-2">: {{ $city->water->drilled_well }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Sumur terlindung</div>
                            <div class="col-2">: {{ $city->water->protected_well }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Sumur tak terlindung</div>
                            <div class="col-2">: {{ $city->water->unprotected_well }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Mata air terlindung</div>
                            <div class="col-2">: {{ $city->water->protected_spring }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Mata air tak terlindung</div>
                            <div class="col-2">: {{ $city->water->unprotected_spring }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Air sungai/Danau/Kolam/ Waduk</div>
                            <div class="col-2">: {{ $city->water->nature }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Air hujan</div>
                            <div class="col-2">: {{ $city->water->rainwater }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Lainnya</div>
                            <div class="col-2">: {{ $city->water->other }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 fw-bold">Sanitasi</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Terlayani Sanitasi</div>
                            <div class="col-4">Cubluk</div>
                            <div class="col-2">: {{ $city->sanitation->latrine }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Tangki Septic</div>
                            <div class="col-2">: {{ $city->sanitation->septic_tank }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Ipal Komunal</div>
                            <div class="col-2">: {{ $city->sanitation->ipal }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">Tidak Terlayani Sanitasi</div>
                            <div class="col-4">Tidak Memiliki MCK</div>
                            <div class="col-2">: {{ $city->unserved_sanitation->no_toilet }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">Tidak Memiliki Septitank</div>
                            <div class="col-2">: {{ $city->unserved_sanitation->no_septic_tank }}</div>
                            <div class="col-2 text-left">KRT</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
