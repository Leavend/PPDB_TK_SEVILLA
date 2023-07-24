@extends('layoutdashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Pendaftaran</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                {{-- @foreach ($dataPendaftaran as $viewData) --}}
                <div class="row">
                    @csrf
                    <div class="col-xl-12">
                        <div class="custom-accordion">
                            @if (Auth::user()->user_type == 1)
                                <div class="row my-4">
                                    <div class="col">
                                        <div class="text-end mt-2 mt-sm-0">
                                            <a href="../../data-registration">
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">Close</button>
                                            </a>
                                            @if ($viewData->status_pendaftaran == 'Belum Terverifikasi')
                                                <a href="../../verified-registration/{{ $viewData->id_pendaftaran }}">
                                                    <button type="button" class="btn btn-primary">Verified</button>
                                                </a>
                                            @endif
                                            <a href="../../card-registration/{{ $viewData->id }}">
                                                <button type="button" class="btn btn-primary">View Card</button>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row-->
                            @elseif(Auth::user()->user_type == 2)
                                @if ($viewData->status_pendaftaran == 'Belum Terverifikasi')
                                    <div class="alert alert-success alert-dismissible fade show">

                                        <strong>Sukses!</strong> Data pendaftaranmu terkirim. Sebelum melakukan
                                        pembayaran,
                                        tunggu administrator memverifikasi datamu ya.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="btn-close"></button>
                                    </div>
                                @elseif (
                                    $viewData->status_pendaftaran == 'Terverifikasi' &&
                                        $viewDataPembayaran->status != 'Gratis' &&
                                        $viewDataPembayaran->status != 'Dibayar')
                                    <div class="alert alert-info alert-dismissible fade show">
                                        <strong>Informasi!</strong> Segera lakukan pembayaran.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="btn-close"></button>
                                    </div>
                                @endif
                                <div class="text-end">
                                    <a
                                        href="{{ route('siswa/detail-pendaftaran', ['id_pendaftaran' => $viewData->id_pendaftaran]) }}">
                                        <button type="button" class="btn btn-primary">Lihat Kartu Pendaftaran</button>
                                    </a>
                                </div>
                            @endif

                            <div class="card card-body">
                                <div class="card-header">
                                    <h4 class="card-title">Data Pendaftaran</h4>
                                    <!-- center modal -->
                                    <div>
                                        @if ($viewData->status_pendaftaran == 'Belum Terverifikasi')
                                            <button class="btn btn-warning mb-4" style="margin-bottom: 1rem;" disabled>Belum
                                                Terverifikasi</button>
                                        @elseif ($viewData->status_pendaftaran == 'Terverifikasi')
                                            @if ($viewDataPembayaran->status != 'Gratis' && $viewDataPembayaran->status != 'Dibayar')
                                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                                    data-bs-target=".upload" style="margin-bottom: 1rem;"><i
                                                        class="mdi mdi-plus me-1"></i>Upload
                                                    Pembayaran</button>
                                            @endif
                                            <button class="btn btn-success mb-4" style="margin-bottom: 1rem;"
                                                disabled>Terverifikasi</button>
                                        @elseif ($viewData->status_pendaftaran == 'Selesai')
                                            <button class="btn btn-primary mb-4" style="margin-bottom: 1rem;"
                                                disabled>Selesai</button>
                                        @else
                                            <span class="badge badge-danger">Data Tidak Sah</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal fade upload" tabindex="-1" role="dialog"
                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Kirim bukti pembayaran</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('upload-payment') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_pendaftaran" id="nama"
                                                            class="form-control" value="{{ $viewData->id_pendaftaran }}">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <label for="iduser">Pilih Dokumen</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Upload</span>
                                                                    <div class="form-file">
                                                                        <input type="file"
                                                                            class="form-file-input form-control"
                                                                            name="pem">
                                                                        <input type="hidden"
                                                                            class="form-file-input form-control"
                                                                            name="pathnya">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-top-0 d-flex">
                                                        <button type="button" class="btn btn-danger light"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="add"
                                                            class="btn btn-primary">Perbaharui Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="pt-4 border-bottom-1 pb-3">
                                                    <h4 class="text-primary"><b>PROFIL SISWA</b></h4>
                                                </div>
                                                <!-- Rows with profil data -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <img src="{{ asset($viewData->pas_foto) }}" width="250px" height="300"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary"><b>DATA ORANG TUA</b></h4>
                                    </div>
                                    <div class="row">
                                        <!-- Rows with data orang tua -->
                                    </div>
                                    <div class="row mb-3">
                                        <!-- Rows with berkas orang tua -->
                                    </div>
                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary"><b>DATA REGISTRASI</b></h4>
                                    </div>
                                    <div class="row mb-3">
                                        <!-- Rows with data registrasi -->
                                    </div>
                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary"><b>DATA SEKOLAH DAN PENDIDIKAN SEBELUMNYA</b></h4>
                                    </div>
                                    <div class="row mb-3">
                                        <!-- Rows with data sekolah dan pendidikan sebelumnya -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}

            </div>
            <!-- /.container-fluid -->
        </section>



    </div>
    <!-- end content-wrapper -->
@endsection
