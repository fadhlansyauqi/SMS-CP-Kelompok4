@extends('layouts.app')

@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>SPP Saya</b></h3>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('student.dashboard') }}" class="text-muted">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">SPP Saya</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="content-header">
        <div class="container-fluid">            
            <div class="container-fluid card-body">
                <!-- header  -->
            </div>
        </div>
    </div>

    <div class="content card">
        <div class="container-fluid card-body pt-5">
            <form id="form-pembayaran" action="#" method="post">
                <h2 class="mb-4">Formulir Pembayaran SPP</h2>
                <div class="form-group">
                    <label for="nama">Nama Siswa:</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Ucup" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Contoh: 9A" required>
                </div>

                <div class="form-group">
                    <label for="spp_bulan">Pilih SPP Bulan:</label>
                    <select class="form-control" id="spp_bulan" name="spp_bulan" required>
                        <option value="" disabled selected>Pilih Bulan</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="tanggal_pembayaran">Tanggal Pembayaran:</label>
                    <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" required>
                </div>

                <div class="form-group">
                    <label for="nominal">Nominal Pembayaran:</label>
                    <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Contoh: 150000" required>
                </div>

                <div class="form-group">
                    <label for="metode_pembayaran">Metode Pembayaran:</label>
                    <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" onchange="toggleBankDetails()">
                        <option value="tunai">Tunai</option>
                        <option value="bank">Transfer</option>
                    </select>
                </div>

                <div id="bank-details-container" style="display: none;">
                    <!-- Bank details form fields go here -->
                    <div class="form-group">
                        <label for="bank_name">Nama Bank:</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Contoh: Bank ABC" required>
                    </div>

                    <div class="form-group">
                        <label for="account_number">Rekening Sekolah:</label>
                        <select class="form-control" id="account_number" name="account_number" required>
                            <option value="" disabled selected></option>
                            <option value="Januari">123456-9999</option>                           
                        </select>
                    </div>
                </div>
               

                <button type="button" onclick="submitForm()" class="btn btn-success mb-5">Bayar SPP</button>
            </form>

            <div id="bukti-container" class="bukti-container">
                <div id="bukti-pembayaran" class="bukti-pembayaran">
                    <!-- Informasi bukti pembayaran akan ditampilkan di sini -->
                </div>                
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <script>
                function toggleBankDetails() {
                    var selectedMethod = document.getElementById('metode_pembayaran').value;
                    var bankDetailsContainer = document.getElementById('bank-details-container');

                    if (selectedMethod === 'bank') {
                        bankDetailsContainer.style.display = 'block';
                    } else {
                        bankDetailsContainer.style.display = 'none';
                    }
                }

                function submitForm() {
                    // Validasi formulir
                    var nama = document.getElementById('nama').value;
                    var kelas = document.getElementById('kelas').value;
                    var sppbulan = document.getElementById('spp_bulan').value;
                    var rawTanggalPembayaran = document.getElementById('tanggal_pembayaran').value;
                    var nominal = document.getElementById('nominal').value;
                    
                    if (nama === '' || kelas === '' || sppbulan === '' || rawTanggalPembayaran === '' || nominal === '') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Ups..',
                            text: 'Silakan lengkapi semua kolom formulir!',
                        });
                        return;
                    }

                    // Format tanggal pembayaran to Indonesian format
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    var tanggalPembayaran = new Date(rawTanggalPembayaran).toLocaleDateString('id-ID', options);
                    // Tampilkan informasi bukti pembayaran
                    var buktiPembayaran = document.getElementById('bukti-pembayaran');
                    buktiPembayaran.innerHTML = `
                        <div style="border: 2px solid #333; padding: 20px; border-radius: 10px; background-color: #f8f9fa; margin-bottom: 20px;">
                            <h3 style="text-align: center; color: #007bff;">Bukti Pembayaran SPP</h3>
                            <hr style="border: 1px solid #007bff; margin-top: 10px; margin-bottom: 20px;">
                            <p><strong>Nama Siswa:</strong> ${nama}</p>
                            <p><strong>Kelas:</strong> ${kelas}</p>
                            <p><strong>Spp Bulan:</strong> ${sppbulan}</p>
                            <p><strong>Tanggal Pembayaran:</strong> ${tanggalPembayaran}</p>
                            <p><strong>Nominal Pembayaran:</strong> Rp ${nominal}</p>
                            <div style="margin-top: 20px; text-align: center;">
                                <p style="margin-bottom: 5px;"><strong>TTD Petugas:</strong></p>
                                <img alt="Logo" class="opacity-25" src="assets/media/logos/sms-logo.png" style="max-width: 10%; height: auto;" border: 1px solid #333; border-radius: 5px;">
                                <p style="margin-top: 5px;">Sulistiyo,S.pd</p>
                            </div>
                            <button onclick="printBukti()" class="btn btn-primary mt-3">Cetak Bukti Pembayaran</button>
                        </div>
                    `;

                    // Tampilkan container bukti pembayaran
                    document.getElementById('form-pembayaran').style.display = 'none';
                    document.getElementById('bukti-container').style.display = 'block';

                    // Tampilkan Sweet Alert sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Formulir pembayaran telah berhasil diisi!',
                    });
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
