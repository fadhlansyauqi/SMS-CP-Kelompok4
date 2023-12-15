@extends('layouts.app')

<style>
    form {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .bukti-container {
        display: none;
        margin-top: 20px;
    }

    .bukti-pembayaran {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        .bukti-container,
        .bukti-container * {
            visibility: visible;
        }

        .bukti-container {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>SPP Saya</b></h3>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('student.dashboard') }}" class="text-muted">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">SPP Saya</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content card">
        <div class="container-fluid card-body">
            <form id="form-pembayaran" action="#" method="post">
                <h2>Formulir Pembayaran SPP</h2>
                <label for="nama">Nama Siswa:</label>
                <input type="text" id="nama" name="nama" required>

                <label for="kelas">Kelas:</label>
                <input type="text" id="kelas" name="kelas" required>

                <label for="spp_bulan">SPP Bulan:</label>
                <input type="text" id="spp_bulan" name="spp_bulan" placeholder="Contoh: Januari, Februari" required>

                <label for="tanggal_pembayaran">Tanggal Pembayaran:</label>
                <input type="date" id="tanggal_pembayaran" name="tanggal_pembayaran" required>

                <label for="nominal">Nominal Pembayaran:</label>
                <input type="text" id="nominal" name="nominal" required>

                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select id="metode_pembayaran" name="metode_pembayaran" onchange="toggleBankDetails()">
                    <option value="tunai">Tunai</option>
                    <option value="bank">Bank</option>
                </select>

                <!-- Jika metode pembayaran adalah "Bank", tampilkan input untuk nomor rekening bank -->
                <div id="bank-details" style="display: none;">
                    <label for="nomor_rekening">Nomor Rekening Bank:</label>
                    <input type="text" id="nomor_rekening" name="nomor_rekening">
                </div>

                <button type="button" onclick="submitForm()">Bayar SPP</button>
            </form>

            <div id="bukti-container" class="bukti-container">
                <h2>Bukti Pembayaran</h2>
                <div id="bukti-pembayaran" class="bukti-pembayaran">
                    <!-- Informasi bukti pembayaran akan ditampilkan di sini -->
                </div>
                <button onclick="printBukti()">Cetak Bukti Pembayaran</button>
            </div>

            <script>
        function submitForm() {
            // Simulasi proses pembayaran, Anda perlu menyesuaikan ini dengan backend Anda
            var nama = document.getElementById('nama').value;
            var kelas = document.getElementById('kelas').value;
            var sppbulan = document.getElementById('spp_bulan').value;
            var tanggalPembayaran = document.getElementById('tanggal_pembayaran').value;
            var nominal = document.getElementById('nominal').value;

            // Tampilkan informasi bukti pembayaran
            var buktiPembayaran = document.getElementById('bukti-pembayaran');
            buktiPembayaran.innerHTML = `
                <p>Nama Siswa: ${nama}</p>
                <p>Kelas: ${kelas}</p>
                <p>Spp Bulan: ${sppbulan}</p>
                <p>Tanggal Pembayaran: ${tanggalPembayaran}</p>
                <p>Nominal Pembayaran: ${nominal}</p>
            `;

            // Tampilkan container bukti pembayaran
            document.getElementById('bukti-container').style.display = 'block';
        }

        function printBukti() {
            // Cetak bukti pembayaran
            window.print();
        }
    </script>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
