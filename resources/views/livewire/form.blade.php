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
    <div class="row gap-4 mx-0 mx-md-4">
        @if (session('import'))
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('import') }}
                </div>
            </div>
        @endif
        <div class="card bg-component mt-2">
            <div class="col-12">
                <h1>{{ $allSum['negative_list']['rail'] ?? null }}</h1>
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
                                    <th style="border-bottom: 2px solid black;" class="text-center w-25">Sumber Dana
                                    </th>
                                    <th style="border-bottom: 2px solid black;" class="text-center w-25">Tahun</th>
                                    <th style="border-bottom: 2px solid black;" class="text-center">Nominal</th>
                                    <th style="border-bottom: 2px solid black;" class="text-center">Volume</th>
                                    <th style="border-bottom: 2px solid black;">Capaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sempadan Rel<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td id="railFirstCon"></td>
                                    <input type="hidden" name="rail[firstCon]" id="railFirstConInput">
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="rail[source]">
                                            <option selected value="APBD">APBD</option>
                                            <option value="APBD_prov">APBD Provinsi</option>
                                            <option value="APBN">APBN</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="rail[year]">
                                            <option selected value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </td>
                                    <td><input wire:model="rail_APBN" id="rail_nominal"
                                            class="form-control custom-input" name="rail[nominal]" type="number">
                                    </td>
                                    <td>
                                        <input id="rail_volume" class="form-control custom-input" type="number"
                                            name="rail[volume]">
                                    </td>
                                    <td id="railAchieve"></td>
                                    <input type="hidden" id="railAchieveInput" name="rail[achieve]">
                                </tr>
                                <tr>
                                    <td>Sempadan Sungai<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td id="riverFirstCon"></td>
                                    <input type="hidden" name="river[firstCon]" id="riverFirstConInput">
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="river[source]">
                                            <option selected value="APBD">APBD</option>
                                            <option value="APBD_prov">APBD Provinsi</option>
                                            <option value="APBN">APBN</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="river[year]">
                                            <option selected value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </td>
                                    <td><input wire:model="river_APBN" id="river_nominal"
                                            class="form-control custom-input" name="river[nominal]" type="number">
                                    </td>
                                    <td>
                                        <input id="river_volume" class="form-control custom-input" type="number"
                                            name="river[volume]">
                                    </td>
                                    <td id="riverAchieve"></td>
                                    <input type="hidden" id="riverAchieveInput" name="river[achieve]">
                                </tr>
                                <tr>
                                    <td>Sutet<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td id="sutetFirstCon"></td>
                                    <input type="hidden" name="sutet[firstCon]" id="sutetFirstConInput">
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="sutet[source]">
                                            <option selected value="APBD">APBD</option>
                                            <option value="APBD_prov">APBD Provinsi</option>
                                            <option value="APBN">APBN</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="sutet[year]">
                                            <option selected value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </td>
                                    <td><input wire:model="sutet_APBN" id="sutet_nominal"
                                            class="form-control custom-input" name="sutet[nominal]" type="number">
                                    </td>
                                    <td>
                                        <input id="sutet_volume" class="form-control custom-input" type="number"
                                            name="sutet[volume]">
                                    </td>
                                    <td id="sutetAchieve"></td>
                                    <input type="hidden" id="sutetAchieveInput" name="sutet[achieve]">
                                </tr>
                                <tr>
                                    <td>Kolong Jembatan<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td id="bridgeFirstCon"></td>
                                    <input type="hidden" name="bridge[firstCon]" id="bridgeFirstConInput">
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="bridge[source]">
                                            <option selected value="APBD">APBD</option>
                                            <option value="APBD_prov">APBD Provinsi</option>
                                            <option value="APBN">APBN</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="bridge[year]">
                                            <option selected value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </td>
                                    <td><input wire:model="bridge_APBN" id="bridge_nominal"
                                            class="form-control custom-input" name="bridge[nominal]" type="number">
                                    </td>
                                    <td>
                                        <input id="bridge_volume" class="form-control custom-input" type="number"
                                            name="bridge[volume]">
                                    </td>
                                    <td id="bridgeAchieve"></td>
                                    <input type="hidden" id="bridgeAchieveInput" name="bridge[achieve]">
                                </tr>
                                <tr>
                                    <td>Cubluk<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td id="latrineFirstCon"></td>
                                    <input type="hidden" name="latrine[firstCon]" id="latrineFirstConInput">
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="latrine[source]">
                                            <option selected value="APBD">APBD</option>
                                            <option value="APBD_prov">APBD Provinsi</option>
                                            <option value="APBN">APBN</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="latrine[year]">
                                            <option selected value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </td>
                                    <td><input wire:model="latrine_APBN" id="latrine_nominal"
                                            class="form-control custom-input" name="latrine[nominal]" type="number">
                                    </td>
                                    <td>
                                        <input id="latrine_volume" class="form-control custom-input" type="number"
                                            name="latrine[volume]">
                                    </td>
                                    <td id="latrineAchieve"></td>
                                    <input type="hidden" id="latrineAchieveInput" name="latrine[achieve]">
                                </tr>
                                <tr>
                                    <td>Tangki Septik<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td id="septicTankFirstCon"></td>
                                    <input type="hidden" name="septicTank[firstCon]" id="septicTankFirstConInput">
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="septicTank[source]">
                                            <option selected value="APBD">APBD</option>
                                            <option value="APBD_prov">APBD Provinsi</option>
                                            <option value="APBN">APBN</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="septicTank[year]">
                                            <option selected value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </td>
                                    <td><input wire:model="septicTank_APBN" id="septicTank_nominal"
                                            class="form-control custom-input" name="septicTank[nominal]"
                                            type="number">
                                    </td>
                                    <td>
                                        <input id="septicTank_volume" class="form-control custom-input"
                                            type="number" name="septicTank[volume]">
                                    </td>
                                    <td id="septicTankAchieve"></td>
                                    <input type="hidden" id="septicTankAchieveInput" name="septicTank[achieve]">
                                </tr>
                                <tr>
                                    <td>Ipal Komunal<span style="color: red;">*</span></td>
                                    <td>:</td>
                                    <td id="ipalFirstCon"></td>
                                    <input type="hidden" name="ipal[firstCon]" id="ipalFirstConInput">
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="ipal[source]">
                                            <option selected value="APBD">APBD</option>
                                            <option value="APBD_prov">APBD Provinsi</option>
                                            <option value="APBN">APBN</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select bg-main w-100" aria-label="Default select example"
                                            name="ipal[year]">
                                            <option selected value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </td>
                                    <td><input wire:model="ipal_APBN" id="ipal_nominal"
                                            class="form-control custom-input" name="ipal[nominal]" type="number">
                                    </td>
                                    <td>
                                        <input id="ipal_volume" class="form-control custom-input" type="number"
                                            name="ipal[volume]">
                                    </td>
                                    <td id="ipalAchieve"></td>
                                    <input type="hidden" id="ipalAchieveInput" name="ipal[achieve]">
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-around w-100 mb-4">
                        <button type="submit" id="import" class="btn btn-primary"
                            disabled><strong>KIRIM</strong></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card bg-main d-flex flex-column align-items-start w-100 px-4 pb-4">
            <div class="d-flex flex-row justify-content-between align-items-start mt-4 w-100">
                <input type="hidden" name="neighborhood" id="neighborhoodId">
                <span class="w-50">
                    <select id="fundType" class="form-select" aria-label="Default select example">
                        <option value="rail" selected>Sempadan Rel</option>
                        <option value="river">Sempadan Sungai</option>
                        <option value="sutet">Sutet</option>
                        <option value="bridge">Kolong Jembatan</option>
                        <option value="latrine">Cubluk</option>
                        <option value="septicTank">Tangki Septik</option>
                        <option value="ipal">Ipal</option>
                    </select>
                </span>
                <button type="button" id="showFunding" class="btn btn-primary"
                    disabled><strong>TAMPILKAN</strong></button>
            </div>
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start w-100 pb-2">
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center gap-2 fw-bold mt-3"
                        id="titleFunding">
                        Pendanaan
                    </div>
                    <div class="row mt-2">
                        <div class="col">APBD:</div>
                        <div class="col text-end" id="APBDFunding">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">APBD Provinsi:</div>
                        <div class="col text-end" id="APBDProvFunding">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">APBN:</div>
                        <div class="col text-end" id="APBNFunding">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:init', function(e) {

        Livewire.on('getFunding', () => {
            var selectElement = document.getElementById('fundType');
            var selectedValue = selectElement.value; // Ambil nilai awal

            // Event listener untuk memperbarui nilai `selectedValue` setiap kali pilihan dropdown berubah
            selectElement.addEventListener('change', function() {
                selectedValue = selectElement.value; // Perbarui nilai yang dipilih
                console.log('Selected value updated:', selectedValue); // Debug log
            });

            var neighborhoodId = document.getElementById('neighborhoodId').value;

            // Event listener untuk tombol klik 'showFunding' hanya dipasang sekali
            document.getElementById('showFunding').addEventListener('click', function() {
                var url = '/api/getFunding/' + neighborhoodId + '/' + selectedValue;
                console.log('Fetching data from URL:', url); // Debug log

                fetch(url)
                    .then(function(response) {
                        return response.json(); // Mengubah response menjadi JSON
                    })
                    .then(function(data) {
                        console.log('ini data:', data); // Debug log

                        var titleFunding = document.getElementById('titleFunding');
                        var APBDFunding = document.getElementById('APBDFunding');
                        var APBDProvFunding = document.getElementById('APBDProvFunding');
                        var APBNFunding = document.getElementById('APBNFunding');

                        // Mengatur judul berdasarkan selectedValue
                        if (selectedValue == 'rail') {
                            titleFunding.innerHTML = 'Pendanaan Sempadan Rel';
                        } else if (selectedValue == 'river') {
                            titleFunding.innerHTML = 'Pendanaan Sempadan Sungai';
                        } else if (selectedValue == 'sutet') {
                            titleFunding.innerHTML = 'Pendanaan Sutet';
                        } else if (selectedValue == 'bridge') {
                            titleFunding.innerHTML = 'Pendanaan Kolong Jembatan';
                        } else if (selectedValue == 'latrine') {
                            titleFunding.innerHTML = 'Pendanaan Cubluk';
                        } else if (selectedValue == 'septicTank') {
                            titleFunding.innerHTML = 'Pendanaan Tangki Septik';
                        } else if (selectedValue == 'ipal') {
                            titleFunding.innerHTML = 'Pendanaan Ipal';
                        }

                        // Fungsi untuk format Rupiah
                        function formatRupiah(amount) {
                            return new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(amount);
                        }

                        // Memasukkan data pendanaan dengan format Rupiah
                        APBDFunding.innerHTML = data.APBDfunding.length > 0 ? formatRupiah(
                            data.APBDfunding[0].nominal) : 'No data';
                        APBDProvFunding.innerHTML = data.APBDProvfunding.length > 0 ?
                            formatRupiah(data.APBDProvfunding[0].nominal) : 'No data';
                        APBNFunding.innerHTML = data.APBNfunding.length > 0 ? formatRupiah(
                            data.APBNfunding[0].nominal) : 'No data';
                    })
                    .catch(function(error) {
                        console.error('Error:', error);
                    });
            });

        });



        document.getElementById('rail_volume').addEventListener('input', function() {
            var railFirstConValue = document.getElementById('railFirstCon').innerHTML;
            var railAchieve = document.getElementById('railAchieve');
            var value = railFirstConValue - parseInt(this.value);
            railAchieve.innerHTML = value;
            var railAchieveInput = document.getElementById('railAchieveInput');
            railAchieveInput.value = value;
        })

        document.getElementById('river_volume').addEventListener('input', function() {
            var riverFirstConValue = document.getElementById('riverFirstCon').innerHTML;
            var riverAchieve = document.getElementById('riverAchieve');
            var value = riverFirstConValue - parseInt(this.value);
            riverAchieve.innerHTML = value;
            var riverAchieveInput = document.getElementById('riverAchieveInput');
            riverAchieveInput.value = value;
        })

        document.getElementById('sutet_volume').addEventListener('input', function() {
            var sutetFirstConValue = document.getElementById('sutetFirstCon').innerHTML;
            var sutetAchieve = document.getElementById('sutetAchieve');
            var value = sutetFirstConValue - parseInt(this.value);
            sutetAchieve.innerHTML = value;
            var sutetAchieveInput = document.getElementById('sutetAchieveInput');
            sutetAchieveInput.value = value;
        })

        document.getElementById('bridge_volume').addEventListener('input', function() {
            var bridgeFirstConValue = document.getElementById('bridgeFirstCon').innerHTML;
            var bridgeAchieve = document.getElementById('bridgeAchieve');
            var value = bridgeFirstConValue - parseInt(this.value);
            bridgeAchieve.innerHTML = value;
            var bridgeAchieveInput = document.getElementById('bridgeAchieveInput');
            bridgeAchieveInput.value = value;
        })

        document.getElementById('latrine_volume').addEventListener('input', function() {
            var latrineFirstConValue = document.getElementById('latrineFirstCon').innerHTML;
            var latrineAchieve = document.getElementById('latrineAchieve');
            var value = latrineFirstConValue - parseInt(this.value);
            latrineAchieve.innerHTML = value;
            var latrineAchieveInput = document.getElementById('latrineAchieveInput');
            latrineAchieveInput.value = value;
        })

        document.getElementById('septicTank_volume').addEventListener('input', function() {
            var septicTankFirstConValue = document.getElementById('septicTankFirstCon').innerHTML;
            var septicTankAchieve = document.getElementById('septicTankAchieve');
            var value = septicTankFirstConValue - parseInt(this.value);
            septicTankAchieve.innerHTML = value;
            var septicTankAchieveInput = document.getElementById('septicTankAchieveInput');
            septicTankAchieveInput.value = value;
        })

        document.getElementById('ipal_volume').addEventListener('input', function() {
            var ipalFirstConValue = document.getElementById('ipalFirstCon').innerHTML;
            var ipalAchieve = document.getElementById('ipalAchieve');
            var value = ipalFirstConValue - parseInt(this.value);
            ipalAchieve.innerHTML = value;
            var ipalAchieveInput = document.getElementById('ipalAchieveInput');
            ipalAchieveInput.value = value;
        })

        // var railApbd = document.getElementById('rail_APBD');
        // var railApbdProv = document.getElementById('rail_APBD_prov');
        // var railApbn = document.getElementById('rail_APBN');

        // function calculateRailAchieve() {
        //     var railApbdValue = parseInt(railApbd.value) || 0; // Jika input kosong, nilai akan menjadi 0
        //     var railApbdProvValue = parseInt(railApbdProv.value) || 0;
        //     var railApbnValue = parseInt(railApbn.value) || 0;

        //     var railAchieve = railApbdValue + railApbdProvValue + railApbnValue;

        //     document.getElementById('railAchieve').innerHTML = railAchieve;
        //     document.getElementById('railAchieveInput').value = railAchieve;
        // }

        // railApbd.addEventListener('input', calculateRailAchieve);
        // railApbdProv.addEventListener('input', calculateRailAchieve);
        // railApbn.addEventListener('input', calculateRailAchieve);



        // var riverApbd = document.getElementById('river_APBD');
        // var riverApbdProv = document.getElementById('river_APBD_prov');
        // var riverApbn = document.getElementById('river_APBN');

        // function calculateRiverAchieve() {
        //     var riverApbdValue = parseInt(riverApbd.value) || 0; // Jika input kosong, nilai akan menjadi 0
        //     var riverApbdProvValue = parseInt(riverApbdProv.value) || 0;
        //     var riverApbnValue = parseInt(riverApbn.value) || 0;

        //     var riverAchieve = riverApbdValue + riverApbdProvValue + riverApbnValue;

        //     document.getElementById('riverAchieve').innerHTML = riverAchieve;
        //     document.getElementById('riverAchieveInput').value = riverAchieve;
        // }

        // riverApbd.addEventListener('input', calculateRiverAchieve);
        // riverApbdProv.addEventListener('input', calculateRiverAchieve);
        // riverApbn.addEventListener('input', calculateRiverAchieve);

        // var sutetApbd = document.getElementById('sutet_APBD');
        // var sutetApbdProv = document.getElementById('sutet_APBD_prov');
        // var sutetApbn = document.getElementById('sutet_APBN');

        // function calculateSutetAchieve() {
        //     var sutetApbdValue = parseInt(sutetApbd.value) || 0; // Jika input kosong, nilai akan menjadi 0
        //     var sutetApbdProvValue = parseInt(sutetApbdProv.value) || 0;
        //     var sutetApbnValue = parseInt(sutetApbn.value) || 0;

        //     var sutetAchieve = sutetApbdValue + sutetApbdProvValue + sutetApbnValue;

        //     document.getElementById('sutetAchieve').innerHTML = sutetAchieve;
        //     document.getElementById('sutetAchieveInput').value = sutetAchieve;
        // }

        // sutetApbd.addEventListener('input', calculateSutetAchieve);
        // sutetApbdProv.addEventListener('input', calculateSutetAchieve);
        // sutetApbn.addEventListener('input', calculateSutetAchieve);


        // var bridgeApbd = document.getElementById('bridge_APBD');
        // var bridgeApbdProv = document.getElementById('bridge_APBD_prov');
        // var bridgeApbn = document.getElementById('bridge_APBN');

        // function calculateBridgeAchieve() {
        //     var bridgeApbdValue = parseInt(bridgeApbd.value) || 0; // Jika input kosong, nilai akan menjadi 0
        //     var bridgeApbdProvValue = parseInt(bridgeApbdProv.value) || 0;
        //     var bridgeApbnValue = parseInt(bridgeApbn.value) || 0;

        //     var bridgeAchieve = bridgeApbdValue + bridgeApbdProvValue + bridgeApbnValue;

        //     document.getElementById('bridgeAchieve').innerHTML = bridgeAchieve;
        //     document.getElementById('bridgeAchieveInput').value = bridgeAchieve;
        // }

        // bridgeApbd.addEventListener('input', calculateBridgeAchieve);
        // bridgeApbdProv.addEventListener('input', calculateBridgeAchieve);
        // bridgeApbn.addEventListener('input', calculateBridgeAchieve);

        // var latrineApbd = document.getElementById('latrine_APBD');
        // var latrineApbdProv = document.getElementById('latrine_APBD_prov');
        // var latrineApbn = document.getElementById('latrine_APBN');

        // function calculateLatrineAchieve() {
        //     var latrineApbdValue = parseInt(latrineApbd.value) || 0; // Jika input kosong, nilai akan menjadi 0
        //     var latrineApbdProvValue = parseInt(latrineApbdProv.value) || 0;
        //     var latrineApbnValue = parseInt(latrineApbn.value) || 0;

        //     var latrineAchieve = latrineApbdValue + latrineApbdProvValue + latrineApbnValue;

        //     document.getElementById('latrineAchieve').innerHTML = latrineAchieve;
        //     document.getElementById('latrineAchieveInput').value = latrineAchieve;
        // }

        // latrineApbd.addEventListener('input', calculateLatrineAchieve);
        // latrineApbdProv.addEventListener('input', calculateLatrineAchieve);
        // latrineApbn.addEventListener('input', calculateLatrineAchieve);

        // var septicTankApbd = document.getElementById('septic_tank_APBD');
        // var septicTankApbdProv = document.getElementById('septic_tank_APBD_prov');
        // var septicTankApbn = document.getElementById('septic_tank_APBN');

        // function calculateSepticTankAchieve() {
        //     var septicTankApbdValue = parseInt(septicTankApbd.value) ||
        //         0; // Jika input kosong, nilai akan menjadi 0
        //     var septicTankApbdProvValue = parseInt(septicTankApbdProv.value) || 0;
        //     var septicTankApbnValue = parseInt(septicTankApbn.value) || 0;

        //     var septicTankAchieve = septicTankApbdValue + septicTankApbdProvValue + septicTankApbnValue;

        //     document.getElementById('septicTankAchieve').innerHTML = septicTankAchieve;
        //     document.getElementById('septicTankAchieveInput').value = septicTankAchieve;
        // }

        // septicTankApbd.addEventListener('input', calculateSepticTankAchieve);
        // septicTankApbdProv.addEventListener('input', calculateSepticTankAchieve);
        // septicTankApbn.addEventListener('input', calculateSepticTankAchieve);

        // var septicTankApbd = document.getElementById('septic_tank_APBD');
        // var septicTankApbdProv = document.getElementById('septic_tank_APBD_prov');
        // var septicTankApbn = document.getElementById('septic_tank_APBN');

        // function calculateSepticTankAchieve() {
        //     var septicTankApbdValue = parseInt(septicTankApbd.value) ||
        //         0; // Jika input kosong, nilai akan menjadi 0
        //     var septicTankApbdProvValue = parseInt(septicTankApbdProv.value) || 0;
        //     var septicTankApbnValue = parseInt(septicTankApbn.value) || 0;

        //     var septicTankAchieve = septicTankApbdValue + septicTankApbdProvValue + septicTankApbnValue;

        //     document.getElementById('septicTankAchieve').innerHTML = septicTankAchieve;
        //     document.getElementById('septicTankAchieveInput').value = septicTankAchieve;
        // }

        // septicTankApbd.addEventListener('input', calculateSepticTankAchieve);
        // septicTankApbdProv.addEventListener('input', calculateSepticTankAchieve);
        // septicTankApbn.addEventListener('input', calculateSepticTankAchieve);

        // var ipalApbd = document.getElementById('ipal_APBD');
        // var ipalApbdProv = document.getElementById('ipal_APBD_prov');
        // var ipalApbn = document.getElementById('ipal_APBN');

        // function calculateipalAchieve() {
        //     var ipalApbdValue = parseInt(ipalApbd.value) || 0; // Jika input kosong, nilai akan menjadi 0
        //     var ipalApbdProvValue = parseInt(ipalApbdProv.value) || 0;
        //     var ipalApbnValue = parseInt(ipalApbn.value) || 0;

        //     var ipalAchieve = ipalApbdValue + ipalApbdProvValue + ipalApbnValue;

        //     document.getElementById('ipalAchieve').innerHTML = ipalAchieve;
        //     document.getElementById('ipalAchieveInput').value = ipalAchieve;
        // }

        // ipalApbd.addEventListener('input', calculateipalAchieve);
        // ipalApbdProv.addEventListener('input', calculateipalAchieve);
        // ipalApbn.addEventListener('input', calculateipalAchieve);


        Livewire.on('unDisable', function(data) {

            document.getElementById('form').action = '/do-import/' + data[0].neighborhoodId +
                '/' + data[0].villageId;

            document.getElementById('import').disabled = false;
            document.getElementById('showFunding').disabled = false;
            document.getElementById('neighborhoodId').value = data[0].neighborhoodId;
        });
        Livewire.on('showValueInput', function(data) {
            console.log(data);

            // document.getElementById('rail_APBD').value = data[0]['rail_APBD'];
            // document.getElementById('rail_APBD_prov').value = data[0]['rail_APBD_prov'];
            // document.getElementById('rail_APBN').value = data[0]['rail_APBN'];
            // document.getElementById('river_APBD').value = data[0]['river_APBD'];
            // document.getElementById('river_APBD_prov').value = data[0]['river_APBD_prov'];
            // document.getElementById('river_APBN').value = data[0]['river_APBN'];
            // document.getElementById('sutet_APBD').value = data[0]['sutet_APBD'];
            // document.getElementById('sutet_APBD_prov').value = data[0]['sutet_APBD_prov'];
            // document.getElementById('sutet_APBN').value = data[0]['sutet_APBN'];
            // document.getElementById('bridge_APBD').value = data[0]['bridge_APBD'];
            // document.getElementById('bridge_APBD_prov').value = data[0]['bridge_APBD_prov'];
            // document.getElementById('bridge_APBN').value = data[0]['bridge_APBN'];
            // document.getElementById('latrine_APBD').value = data[0]['latrine_APBD'];
            // document.getElementById('latrine_APBD_prov').value = data[0]['latrine_APBD_prov'];
            // document.getElementById('latrine_APBN').value = data[0]['latrine_APBN'];
            // document.getElementById('septic_tank_APBD').value = data[0]['septic_tank_APBD'];
            // document.getElementById('septic_tank_APBD_prov').value = data[0]['septic_tank_APBD_prov'];
            // document.getElementById('septic_tank_APBN').value = data[0]['septic_tank_APBN'];
            // document.getElementById('ipal_APBD').value = data[0]['ipal_APBD'];
            // document.getElementById('ipal_APBD_prov').value = data[0]['ipal_APBD_prov'];
            // document.getElementById('ipal_APBN').value = data[0]['ipal_APBN'];
            document.getElementById('railFirstCon').innerHTML = data[0]['rail'];
            document.getElementById('railFirstConInput').value = data[0]['rail'];
            document.getElementById('riverFirstCon').innerHTML = data[0]['river'];
            document.getElementById('riverFirstConInput').value = data[0]['river'];
            document.getElementById('sutetFirstCon').innerHTML = data[0]['sutet'];
            document.getElementById('sutetFirstConInput').value = data[0]['sutet'];
            document.getElementById('bridgeFirstCon').innerHTML = data[0]['bridge'];
            document.getElementById('bridgeFirstConInput').value = data[0]['bridge'];
            document.getElementById('latrineFirstCon').innerHTML = data[0]['latrine'];
            document.getElementById('latrineFirstConInput').value = data[0]['latrine'];
            document.getElementById('septicTankFirstCon').innerHTML = data[0]['septic_tank'];
            document.getElementById('septicTankFirstConInput').value = data[0]['septic_tank'];
            document.getElementById('ipalFirstCon').innerHTML = data[0]['ipal'];
            document.getElementById('ipalFirstConInput').value = data[0]['ipal'];
        });
    });
</script>
