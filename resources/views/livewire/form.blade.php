<style>
    /* Tambahkan CSS ini */
    .custom-input {
        width: 100%;
        /* Pastikan input mengambil lebar penuh */
        min-width: 150px;
        /* Atur ukuran minimum untuk input agar tidak terlalu kecil */
    }
</style>
<div class="container my-4">
    <div class="row gap-2 mx-0 mx-md-4">
        @if (session('import'))
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('import') }}
                </div>
            </div>
        @endif
        <div class="card bg-component mt-2">
            <div class="col-12">
                <form action="/do-import" id="form" method="post">
                    @csrf
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="border-bottom: 2px solid black;" class="text-primary">Kawasan Negatif
                                        List</th>
                                    <th style="border-bottom: 2px solid black;"></th>
                                    <th style="border-bottom: 2px solid black;" class="text-center">Kondisi Awal</th>
                                    <th style="border-bottom: 2px solid black;" class="text-center">APBD</th>
                                    <th style="border-bottom: 2px solid black;" class="text-center">APBD Provinsi</th>
                                    <th style="border-bottom: 2px solid black;" class="text-center">APBN</th>
                                    <th style="border-bottom: 2px solid black;">Capaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sempadan Rel<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td>0</td>
                                    <td><input class="form-control custom-input" type="number" name="rel_APBD" value="0"
                                            disabled></td>
                                    <td><input class="form-control custom-input" type="number" name="rel_APBD_prov" value="0"
                                            disabled>
                                    </td>
                                    <td><input class="form-control custom-input" type="number" name="rel_APBN" value="0"
                                            disabled></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Sempadan Sungai<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td>0</td>
                                    <td><input class="form-control custom-input" type="number" name="sungai_APBD" value="0"
                                            disabled></td>
                                    <td><input class="form-control custom-input" type="number" name="sungai_APBD_prov" value="0"
                                            disabled>
                                    </td>
                                    <td><input class="form-control custom-input" type="number" name="sungai_APBN" value="0"
                                            disabled></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Sutet<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td>0</td>
                                    <td><input class="form-control custom-input" type="number" name="sutet_APBD" value="0"
                                            disabled></td>
                                    <td><input class="form-control custom-input" type="number" name="sutet_APBD_prov" value="0"
                                            disabled>
                                    </td> 
                                    </td> 
                                    <td><input class="form-control custom-input" type="number" name="sutet_APBN" value="0"
                                            disabled></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Kolong Jembatan<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td>0</td>
                                    <td><input class="form-control custom-input" type="number" value="0"
                                            name="kolong_jembatan_APBD" disabled></td>
                                    <td><input class="form-control custom-input" type="number" value="0"
                                            name="kolong_jembatan_APBD_prov" disabled></td>
                                    <td><input class="form-control custom-input" type="number" value="0"
                                            name="kolong_jembatan_APBN" disabled></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Cubluk<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td>0</td>
                                    <td><input class="form-control custom-input" type="number" name="cubluk_APBD" value="0"
                                            disabled></td>
                                    <td><input class="form-control custom-input" type="number" name="cubluk_APBD_prov" value="0"
                                            disabled>
                                    </td>
                                    <td><input class="form-control custom-input" type="number" name="cubluk_APBN" value="0"
                                            disabled></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tangki Septic<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td>0</td>
                                    <td><input class="form-control custom-input" type="number" name="septitank_APBD" value="0"
                                            disabled>
                                    </td>
                                    <td><input class="form-control custom-input" type="number" value="0"
                                            name="septitank_APBD_prov" disabled></td>
                                    <td><input class="form-control custom-input" type="number" name="septitank_APBN" value="0"
                                            disabled>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Ipal Komunal<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td>0</td>
                                    <td><input class="form-control custom-input" type="number" name="ipal_APBD" value="0"
                                            disabled></td>
                                    <td><input class="form-control custom-input" type="number" name="ipal_APBD_prov" value="0"
                                            disabled>
                                    </td>
                                    <td><input class="form-control custom-input" type="number" name="ipal_APBN" value="0"
                                            disabled></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-around w-100 mb-4">
                        <button type="button" class="btn btn-primary mb-2 mb-md-0"><strong>EXPORT</strong></button>
                        <button type="submit" id="import" class="btn btn-primary"
                            disabled><strong>IMPORT</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:init', function() {
        Livewire.on('setData', function(data) {
            console.log(data);
            document.getElementById('form').action = '/do-import/' + data[0].district_id + '/' + data[0]
                .village_id;
            var inputs = document.getElementsByTagName('input');

            for (var i = 0; i < inputs.length; i++) {
                inputs[i].disabled = false;
            };

            document.getElementById('import').disabled = false;
        });
    })
</script>
