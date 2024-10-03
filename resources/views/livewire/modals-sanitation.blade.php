<div>
    @if (Storage::disk('public')->exists($septitankImagePath ?? 'placeholder'))
        <div class="modal fade" id="septitank" aria-hidden="true" aria-labelledby="septitank" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ Storage::url($septitankImagePath) }}" alt="" style="width: 470px;">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="septitank" aria-hidden="true" aria-labelledby="septitank" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center" style="width: 400px; height: 400px; padding-top: 100px;">
                    <i class="far fa-circle-xmark text-danger" style="font-size: 100px;"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center" style="flex-grow: 1;">
                        <h2><strong>Tidak ada gambar</strong></h2>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                            data-mdb-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Storage::disk('public')->exists($cublukImagePath ?? 'placeholder'))
        <div class="modal fade" id="cubluk" aria-hidden="true" aria-labelledby="cubluk" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ Storage::url($cublukImagePath) }}" alt="" style="width: 470px;">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="cubluk" aria-hidden="true" aria-labelledby="cubluk" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center" style="width: 400px; height: 400px; padding-top: 100px;">
                    <i class="far fa-circle-xmark text-danger" style="font-size: 100px;"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center" style="flex-grow: 1;">
                        <h2><strong>Tidak ada gambar</strong></h2>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                            data-mdb-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Storage::disk('public')->exists($cublukImagePath ?? 'placeholder'))
        <div class="modal fade" id="cubluk" aria-hidden="true" aria-labelledby="cubluk" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ Storage::url($cublukImagePath) }}" alt="" style="width: 470px;">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="cubluk" aria-hidden="true" aria-labelledby="cubluk" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center" style="width: 400px; height: 400px; padding-top: 100px;">
                    <i class="far fa-circle-xmark text-danger" style="font-size: 100px;"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center" style="flex-grow: 1;">
                        <h2><strong>Tidak ada gambar</strong></h2>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                            data-mdb-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Storage::disk('public')->exists($ipalImagePath ?? 'placeholder'))
        <div class="modal fade" id="ipal" aria-hidden="true" aria-labelledby="ipal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ Storage::url($ipalImagePath) }}" alt="" style="width: 470px;">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="ipal" aria-hidden="true" aria-labelledby="ipal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center" style="width: 400px; height: 400px; padding-top: 100px;">
                    <i class="far fa-circle-xmark text-danger" style="font-size: 100px;"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center" style="flex-grow: 1;">
                        <h2><strong>Tidak ada gambar</strong></h2>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                            data-mdb-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Storage::disk('public')->exists($noMckImagePath ?? 'placeholder'))
        <div class="modal fade" id="noMck" aria-hidden="true" aria-labelledby="noMck" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ Storage::url($noMckImagePath) }}" alt="" style="width: 470px;">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="noMck" aria-hidden="true" aria-labelledby="noMck" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center" style="width: 400px; height: 400px; padding-top: 100px;">
                    <i class="far fa-circle-xmark text-danger" style="font-size: 100px;"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center" style="flex-grow: 1;">
                        <h2><strong>Tidak ada gambar</strong></h2>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                            data-mdb-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Storage::disk('public')->exists($noSeptitank ?? 'placeholder'))
        <div class="modal fade" id="noSeptitank" aria-hidden="true" aria-labelledby="noSeptitank" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ Storage::url($noSeptitank) }}" alt="" style="width: 470px;">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="noSeptitank" aria-hidden="true" aria-labelledby="noSeptitank" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center" style="width: 400px; height: 400px; padding-top: 100px;">
                    <i class="far fa-circle-xmark text-danger" style="font-size: 100px;"></i>
                    <div class="d-flex flex-column justify-content-center align-items-center" style="flex-grow: 1;">
                        <h2><strong>Tidak ada gambar</strong></h2>
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                            data-mdb-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
