<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bg-component {
            background-color: #f5f5f5;
            /* Warna latar belakang untuk card */
            border-radius: 8px;
            /* Sudut kartu */
            padding: 20px;
            /* Ruang dalam card */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Efek bayangan */
        }

        .table {
            width: 100%;
            /* Lebar tabel penuh */
            border-collapse: collapse;
            /* Hapus ruang antar border */
        }

        .table th,
        .table td {
            padding: 12px;
            /* Jarak dalam sel */
            border: 1px solid #ddd;
            /* Border abu-abu untuk sel */
        }

        .table th {
            background-color: #007bff;
            /* Warna latar belakang header */
            color: white;
            /* Warna teks header */
            font-weight: bold;
            /* Teks tebal untuk header */
            text-align: center;
            /* Teks di tengah */
        }

        .table td {
            text-align: center;
            /* Teks di tengah */
            vertical-align: middle;
            /* Teks di tengah secara vertikal */
        }

        .table td:first-child {
            text-align: left;
            /* Teks kiri hanya untuk kolom pertama */
        }

        .table td:nth-child(2) {
            width: 20px;
            /* Lebar tetap untuk kolom tanda ":" */
            text-align: center;
            /* Teks tengah untuk tanda ":" */
        }

        .table td:last-child {
            font-weight: bold;
            /* Angka pada kolom capaian menjadi tebal */
        }

        .text-primary {
            color: #007bff;
            /* Warna biru untuk teks dengan kelas ini */
        }

        .text-danger {
            color: red;
            /* Warna merah untuk tanda bintang */
        }

        .mt-2 {
            margin-top: 16px;
            /* Jarak atas */
        }

        .mb-4 {
            margin-bottom: 24px;
            /* Jarak bawah */
        }

        .d-flex {
            display: flex;
        }

        .flex-column {
            flex-direction: column;
        }

        .flex-md-row {
            flex-direction: row;
        }

        .justify-content-around {
            justify-content: space-around;
        }

        .w-100 {
            width: 100%;
        }

        @media (max-width: 768px) {

            /* Responsif untuk layar kecil */
            .table td,
            .table th {
                font-size: 14px;
                /* Ukuran font lebih kecil untuk layar kecil */
            }
        }
    </style>

</head>

<body>
    <div class="card bg-component mt-2">
        <div class="col-12">
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
                        <td>
                            {{ $funding['APBD'][0]->achievement->rail_achieve ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD'][0]->rail ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD_prov'][0]->rail ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBN'][0]->rail ?? 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Sempadan Sungai<span style="color: red;">*</span></td>
                        <td>:</td>
                        <td>
                            {{ $funding['APBD'][0]->achievement->river_achieve ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD'][0]->river ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD_prov'][0]->river ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBN'][0]->river ?? 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Sutet<span style="color: red;">*</span></td>
                        <td>:</td>
                        <td>
                            {{ $funding['APBD'][0]->achievement->sutet_achieve ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD'][0]->sutet ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD_prov'][0]->sutet ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBN'][0]->sutet ?? 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Kolong Jembatan<span style="color: red;">*</span></td>
                        <td>:</td>
                        <td>
                            {{ $funding['APBD'][0]->achievement->bridge_achieve ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD'][0]->bridge ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD_prov'][0]->bridge ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBN'][0]->bridge ?? 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Cubluk<span style="color: red;">*</span></td>
                        <td>:</td>
                        <td>
                            {{ $funding['APBD'][0]->achievement->latrine_achieve ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD'][0]->latrine ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD_prov'][0]->latrine ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBN'][0]->latrine ?? 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tangki Septic<span style="color: red;">*</span></td>
                        <td>:</td>
                        <td>
                            {{ $funding['APBD'][0]->achievement->septic_tank_achieve ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD'][0]->septic_tank ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD_prov'][0]->septic_tank ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBN'][0]->septic_tank ?? 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>Ipal Komunal<span style="color: red;">*</span></td>
                        <td>:</td>
                        <td>
                            {{ $funding['APBD'][0]->achievement->ipal_achieve ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD'][0]->ipal ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBD_prov'][0]->ipal ?? 0 }}
                        </td>
                        <td>
                            {{ $funding['APBN'][0]->ipal ?? 0 }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-around w-100 mb-4">
        </div>
    </div>
    </div>
</body>

</html>
