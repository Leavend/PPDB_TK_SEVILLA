@extends('layoutdashboard.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-xs-12 col-sm-6">
                        <h1>Kartu Pendaftaran</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section Header -->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="invoice p-3 mb-3">
                            @csrf
                            <div class="col-xs-12">
                                <div class="card card-body" id="cetak" style="margin-bottom: -1rem">
                                    <div class="p-4">
                                        <div class="d-flex header-kartu">
                                            <div class="col-xs-2 col-lg-2 logo-kartu"
                                                style="text-align: center; margin-right:25px; margin-left:25px;">
                                                <img width="110px" src="{{ asset('assets/img/image_TK/Logo.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="col-xs-10 col-lg-10 text-kartu">
                                                <center>
                                                    <h3 class="form-label" style="margin-top: -0.5rem"><strong
                                                            class="d-block">KARTU
                                                            PESERTA</strong></h3>
                                                    <h5 style="margin-top: -0.5rem"> <strong class="d-block">PENERIMAAN
                                                            MAHASISWA BARU</strong></h5>
                                                        <h4 style="margin-top: -0.5rem"><strong class="d-block">TK Islam
                                                                Sevilla
                                                                AL-Fatah</strong></h4>
                                                            <p style="margin-top: -0.5rem"><strong class="d-block">Jl.
                                                                    Margo
                                                                    Mulyo,
                                                                    Kecamatan Balikpapan Barat,
                                                                    Kota Balikpapan<br>
                                                                    Kalimantan Timur. Kode Pos: 76125 <br> 41152</strong></p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="margin-bottom: -4rem;">
                                        <div class="p-4"
                                            style="border-top: 2px solid black!important; margin-top:-2.5rem;">
                                            <div class="d-flex">
                                                <div class=" col-xs-12 col-lg-4" style="text-align: center; margin-right:25px;">
                                                    <img src="{{ asset($viewData->pas_foto) }}" style="width: 250px; height: 350px; object-fit: cover"  alt="">
                                                </div>
                                                <div class=" col-xs-12 col-lg-8">
                                                    <div class="mb-3 mb-4">
                                                        <h2><strong>DATA PESERTA</strong></h2><br>
                                                        <strong>NOMOR PENDAFTARAN</strong>
                                                        <h5>
                                                            <strong>{{ $viewData->id_pendaftaran }}</strong>
                                                        </h5><br>
                                                        <strong>NAMA PESERTA</strong><br>
                                                        <h5>
                                                            <strong>{{ $viewData->nama_lengkap }}</strong>
                                                        </h5><br>
                                                        <strong>TANGGAL LAHIR</strong>
                                                        <h5>
                                                            <strong>{{ $viewData->tanggal_lahir }}</strong>
                                                        </h5><br>
                                                        <strong>AGAMA</strong>
                                                        <h5>
                                                            <strong>{{ $viewData->agama }}</strong>
                                                        </h5>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mx-5 my-3">
                                                <h4><strong>PERNYATAAN</strong></h4>
                                                <h5 style="text-indent: 0.5in;text-align: justify;">Saya orang tua wali
                                                    yang
                                                    menyatakan bahwa
                                                    data yang
                                                    saya isikan dalam formulir pendaftaran penerimaan Siswa Baru TK
                                                    Sevilla
                                                    Al-Fatah tahun 2023 adalah benar dan saya bersedia menerima
                                                    ketentuan yang
                                                    berlaku. Saya
                                                    bersedia menerima sanksi pembatalan penerimaan apabila melanggar
                                                    pernyataan
                                                    ini.</h5>
                                            </div>
                                            <div class="d-flex">
                                                <div class=" col-xs-12 col-lg-6" style="width:50%; text-align: right; margin:15px;">
                                                    <img width="150px" src="{{ asset('sipenmaru/images/qr.png') }}"
                                                        alt="">
                                                </div>
                                                <div class=" col-xs-12 col-lg-6" style="width:50%;">
                                                    <br>
                                                    <center>
                                                        <h5><label class="form-label"><strong class="d-block">.............,
                                                                    ................., 2023</strong></label>
                                                        </h5>
                                                        <br>
                                                        <p style="color: rgb(156, 156, 156)">ttd</p>
                                                        <br>
                                                        <h5><strong class="d-block">{{ $viewData->nama_ayah }}</strong>
                                                        </h5>
                                                    </center>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row my-4">
                                <div class="col">
                                    <div class="text-end mt-2 mt-sm-0">
                                        <button class="btn btn-success waves-effect waves-light me-1 float-right"
                                            onclick="printDiv('cetak')"><i class="fa fa-print"> </i>Print</button>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row-->
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.Section Content -->



    </div>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents; // Mengembalikan konten asli setelah mencetak
        }
    </script>
@endsection
