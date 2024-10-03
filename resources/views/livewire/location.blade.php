<div class="container">
    <div class="row">
        <div class="col-12">
            <strong class="text-primary">Atur Lokasi</strong>
            <p class="text-muted">
                Atur lokasi yang ingin dilihat informasi nya
            </p>
        </div>
        <!-- KECAMATAN -->
        <div class="col-12 mb-3">
            <label class="text-primary"><strong>KECAMATAN</strong></label>
            <select wire:model.lazy="district_id" class="form-select bg-main w-100" aria-label="Default select example">
                <option selected>Pilih Kecamatan</option>
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- KELURAHAN -->
        <div class="col-12 mb-3">
            <label class="text-primary"><strong>KELURAHAN</strong></label>
            <select wire:model.lazy="village_id" class="form-select bg-main w-100" aria-label="Default select example">
                @if (count($villages) > 0)
                    <option value="{{ $villages[0]->id }}" selected>{{ $villages[0]->name }}</option>
                @else
                    <option selected>Pilih Kelurahan</option>
                @endif
                @foreach ($villages as $village)
                    @if ($villages[0]->id != $village->id)
                        <option value="{{ $village->id }}">{{ $village->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        @if (!request()->routeIs('import') && $isRouteImport == false)
            <!-- RW -->
            <div class="col-12 mb-3">
                <label class="text-primary"><strong>RW</strong></label>
                <select wire:model.lazy="rw" class="form-select bg-main w-100" aria-label="Default select example">
                    @if (count($rws) > 0)
                        <option value="{{ $rws[0] }}" selected>{{ $rws[0] }}</option>
                    @else
                        <option selected>Pilih RW</option>
                    @endif
                    @foreach ($rws as $rw)
                        @if ($rws[0] != $rw)
                            <option value="{{ $rw }}">{{ $rw }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- RT -->
            <div class="col-12 mb-3">
                <label class="text-primary"><strong>RT</strong></label>
                <select wire:model.lazy="rt" class="form-select bg-main w-100" aria-label="Default select example">
                    @if (count($rts) > 0)
                        <option value="{{ $rts[0] }}" selected>{{ $rts[0] }}</option>
                    @else
                        <option selected>Pilih RT</option>
                    @endif
                    @foreach ($rts as $rt)
                        @if ($rts[0] != $rt)
                            <option value="{{ $rt }}">{{ $rt }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        @endif

        <div class="col-12 mb-3">
            <button class="btn btn-primary w-100" wire:click="applyLocation">terapkan</button>
        </div>
        <div class="col-12">
            <strong class="text-primary">Detail lokasi kawasan</strong>
            <p class="text-muted">
                Melihat detail dari lokasi kawasan
            </p>
            <a href="{{ route('lokasi-kawasan', ['id' => $finalNeighborhood->id ?? null]) }}"
                style="{{ $finalNeighborhood == null ? 'pointer-events: none; opacity: 0.6; cursor: not-allowed;' : '' }}"
                class="btn btn-primary w-100" data-mdb-ripple-init>
                Detail
            </a>
        </div>
    </div>
    <div class="text-dark mb-4 mt-3">
        <strong class="text-primary">Export report</strong>
        <p class="text-muted">
            export data dari web app
        </p>
        <div class="d-flex justify-content-start align-items-center gap-2">
            <a href="#" class="badge rounded-pill badge-light">preview</a>
            <a href="export/{{ $neighborhoodId }}/{{ $fundValue ?? 'rail' }}" class="badge rounded-pill badge-dark">export</a>
        </div>
    </div>
</div>
