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
            <span class="text-muted">Akses dashboard admin</span>
            <a href="{{ route('login') }}" class="btn btn-primary w-100" data-mdb-ripple-init>
                Admin
            </a>
        </div>
        @if ($applied == true)
            <div class="col-12 mt-2">
                <a href="{{ route('get-file-xhp', ['neighborhoodId' => $neighborhoodId]) }}"
                    class="btn btn-primary w-100" data-mdb-ripple-init>
                    Unduh file XHP
                </a>
            </div>
        @endif
    </div>
    <div class="text-dark mb-4 mt-3">
        <strong class="text-primary">Export report</strong>
        <p class="text-muted">
            export data dari web app
        </p>
        <div class="d-flex justify-content-start align-items-center gap-2">
            <button wire:ignore type="button" id="streamButton" class="badge rounded-pill badge-light">Preview</button>
            <button wire:ignore type="button" id="exportButton" class="badge rounded-pill badge-dark">Export</button>
        </div>
    </div>
    {{-- <div class="text-dark mb-4 mt-3">
        <strong class="text-primary">Login</strong>
        <p class="text-muted">
            login ke cms admin untuk mengatur data
        </p>
        <div class="d-flex justify-content-start align-items-center gap-2">
            <a href="#"
            class="btn btn-primary w-100"
            data-mdb-ripple-init>
            Login
        </a>
        </div>
    </div> --}}
</div>
<script>
    function openAndDownload(event, fileUrl) {
        console.log(fileUrl);

        event.preventDefault();

        window.open(fileUrl, '_blank');

        const anchor = document.createElement('a');
        anchor.href = fileUrl;
        anchor.download = '';
        anchor.click();
    }
    document.addEventListener('livewire:init', function(e) {

        var streamButton = document.getElementById('streamButton');
        var exportButton = document.getElementById('exportButton');

        streamButton.disabled = true;
        exportButton.disabled = true;

        streamButton.style.opacity = 0.5;
        streamButton.style.cursor = 'not-allowed';

        exportButton.style.opacity = 0.5;
        exportButton.style.cursor = 'not-allowed';

        Livewire.on('setIdExport', function(data) {
            var neighId = data[0];

            streamButton.removeAttribute('disabled');
            exportButton.removeAttribute('disabled');
            streamButton.removeAttribute('style');
            exportButton.removeAttribute('style');

            console.log('streamButton disabled:', streamButton.disabled);
            console.log('exportButton disabled:', exportButton.disabled);

            streamButton.onclick = function() {
                window.location.href = 'stream/' + neighId;
            };
            exportButton.onclick = function() {
                window.location.href = 'export/' + neighId;
            };


        });
    });
</script>
