@extends('layoutdashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Informasi Pendaftaran</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <!-- Admin -->
                @if (Auth::user()->user_type == 1)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-header">
                                    <h4 class="card-title">Data Pendaftar</h4>

                                    <!-- center modal -->
                                    <div>
                                        <button class="btn btn-info waves-effect waves-light mb-4"
                                            onclick="printDiv('cetak')"><i class="fa fa-print"> </i></button>
                                        <a href="form-registration">
                                            <button type="button" class="btn btn-primary mb-4"
                                                style="margin-bottom: 1rem;">
                                                <i class="mdi mdi-plus me-1"></i>Tambah Pendaftaran
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <!-- /.Card-Header -->

                                <div class="card-body" id="cetak">
                                    <div class="table-responsive">
                                        @csrf

                                        <table id="example" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Peserta</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Daftar</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($viewData as $x)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $x->id_pendaftaran }}</td>
                                                        <td>{{ $x->nama_lengkap }}</td>
                                                        <td>{{ $x->jenis_kelamin }}</td>
                                                        <td><strong>{{ \Carbon\Carbon::parse($x->tgl_pendaftaran)->translatedFormat('d F Y') }}</strong>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @if ($x->status_pendaftaran == 'Terverifikasi')
                                                                        <span class="badge badge-success">Terverifikasi<span
                                                                                class="ms-1 fa fa-check"></span></span>
                                                                    @elseif($x->status_pendaftaran == 'Belum Terverifikasi')
                                                                        <span class="badge badge-warning">Belum <br>
                                                                            Terverifikasi<br><span
                                                                                class="ms-1 fas fa-stream"></span></span>
                                                                    @elseif($x->status_pendaftaran == 'Selesai')
                                                                        <span class="badge badge-primary">Selesai<span
                                                                                class="ms-1 fa fa-check"></span></span>
                                                                    @else
                                                                        <span class="badge badge-danger">Not Found<span
                                                                                class="ms-1 fa fa-ban"></span></span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="dropdown text-sans-serif">
                                                                        <button class="btn btn-primary tp-btn-light sharp"
                                                                            type="button" id="order-dropdown-7"
                                                                            data-bs-toggle="dropdown"
                                                                            data-boundary="viewport" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <span>
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                    width="18px" height="18px"
                                                                                    viewbox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1"
                                                                                        fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0"
                                                                                            width="24" height="24">
                                                                                        </rect>
                                                                                        <circle fill="#000000"
                                                                                            cx="5" cy="12"
                                                                                            r="2"></circle>
                                                                                        <circle fill="#000000"
                                                                                            cx="12" cy="12"
                                                                                            r="2"></circle>
                                                                                        <circle fill="#000000"
                                                                                            cx="19" cy="12"
                                                                                            r="2"></circle>
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                                                            aria-labelledby="order-dropdown-7">
                                                                            <div class="py-2">
                                                                                <a class="dropdown-item"
                                                                                    href="/verified-registration/{{ $x->id_pendaftaran }}">Terverifikasi</a>
                                                                                <a class="dropdown-item"
                                                                                    href="/notverified-registration/{{ $x->id_pendaftaran }}">Belum
                                                                                    Terverifikasi</a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item text-success"
                                                                                    href="/finish-registration/{{ $x->id_pendaftaran }}">Selesai</a>
                                                                                <div class="dropdown-divider"></div>
                                                                                <a class="dropdown-item text-danger"
                                                                                    href="/invalid-registration/{{ $x->id_pendaftaran }}">Tidak
                                                                                    Sah</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a class="btn btn-secondary shadow btn-xs sharp me-1"
                                                                    title="Detail Registration"
                                                                    href="detail-registration/{{ $x->id_pendaftaran }}"><i
                                                                        class="fa fa-file-alt"></i></a>
                                                                <a class="btn btn-primary shadow btn-xs sharp me-1"
                                                                    title="Edit"
                                                                    href="edit-registration/{{ $x->id_pendaftaran }}"><i
                                                                        class="fa fa-pencil-alt"></i></a>
                                                                <a class="btn btn-danger shadow btn-xs sharp"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target=".delete{{ $x->id_pendaftaran }}"><i
                                                                        class="fa fa-trash"></i></a>
                                                                <div class="modal fade delete{{ $x->id_pendaftaran }}"
                                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Hapus Data</h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <div class="modal-body text-center">
                                                                                <i class="fa fa-trash"></i><br> Anda yakin
                                                                                ingin menghapus data ini?<br>
                                                                                {{ $x->id_pendaftaran }}
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-danger light"
                                                                                    data-bs-dismiss="modal">Batalkan</button>
                                                                                <a
                                                                                    href="delete-registration/{{ $x->id_pendaftaran }}">
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger shadow">Ya,
                                                                                        Hapus Data!</button>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- /.Table -->
                                    </div>
                                    <!-- /.Card-Body -->
                                </div>
                                <!-- /. card-body -->


                            </div>
                        </div>
                    </div>


                    <!-- USER -->
                @elseif(Auth::user()->user_type == 2)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="mb-4">
                                            <ul class="nav nav-pills" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#AllStatus"
                                                        role="tab">Semua Pendaftaran</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#OnProgress"
                                                        role="tab">Sedang
                                                        Berjalan</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#Finish"
                                                        role="tab">Selesai/Lihat
                                                        Pengumuman</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#Closed"
                                                        role="tab">Dibatalkan</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mb-4">
                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($viewData as $x)
                                                @if (isset($x->email) && Auth::user()->email == $x->email)
                                                    @php
                                                        $no = $no + 1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if ($no == 0)
                                                <a href="{{ route('form-registration') }}"
                                                    class="btn btn-primary btn-rounded fs-18">+
                                                    Daftar Seleksi</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /. card-header -->

                                <div class="card-body">
                                    <div class="tab-content">

                                        <div class="active tab-pane" id="AllStatus">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                                        <table class="table table-head-fixed text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Pendaftaran</th>
                                                                    <th>Pendaftar</th>
                                                                    <th>Pas Foto</th>
                                                                    <th>Tanggal Pendaftaran</th>
                                                                    <th>Status</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php $no = 1; @endphp
                                                                @foreach ($viewData as $x)
                                                                    @if (Auth::user()->email == $x->email)
                                                                        <tr>
                                                                            <td
                                                                                class="text-primary d-block fs-18 font-w500 mb-1">
                                                                                <strong>{{ $x->id_pendaftaran }}</strong>
                                                                            </td>
                                                                            <td><strong>{{ $x->nama_lengkap }}</strong>
                                                                            </td>
                                                                            <td><img src="{{ url('/' . $x->pas_foto) }}"
                                                                                    alt="pas foto" style="width: 40px">
                                                                            </td>
                                                                            <td><strong> <?php
                                                                            // Misalkan $x->tgl_pendaftaran adalah tanggal yang ingin Anda ubah formatnya
                                                                            $originalDate = $x->tgl_pendaftaran;
                                                                            
                                                                            // Ubah format tanggal menjadi "d-m-Y" (tanggal-bulan-tahun)
                                                                            $formattedDate = date('d-m-Y', strtotime($originalDate));
                                                                            
                                                                            // Tampilkan hasilnya
                                                                            echo $formattedDate;
                                                                            ?></strong>
                                                                            </td>
                                                                            <td><strong>
                                                                                    @if ($x->status_pendaftaran == 'Belum Terverifikasi')
                                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                                            class=" btn bgl-warning text-warning fs-16 font-w600">Belum
                                                                                            <br>
                                                                                            Terverifikasi</a>
                                                                                    @elseif($x->status_pendaftaran == 'Terverifikasi')
                                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                                            class=" btn bgl-warning text-success fs-16 font-w600">Terverifikasi</a>
                                                                                    @elseif($x->status_pendaftaran == 'Selesai')
                                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                                            class=" btn bgl-warning text-success fs-16 font-w600">Selesai</a>
                                                                                    @else
                                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                                            class=" btn bgl-warning text-danger fs-16 font-w600">Tidak
                                                                                            Sah</a>
                                                                                    @endif
                                                                                </strong></td>
                                                                            <td><strong><a class="dropdown-item"
                                                                                        href="detail-pendaftaran/{{ $x->id_pendaftaran }}">Lihat
                                                                                        Selengkapnya</a>
                                                                                    @if ($x->status_pendaftaran == 'Selesai')
                                                                                        <a class="dropdown-item"
                                                                                            href="view-announcement/{{ $x->id_pendaftaran }}">Lihat
                                                                                            Pengumuman</a>
                                                                                    @endif
                                                                                </strong></td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /. tab-pane AllStatus -->

                                        <div class="tab-pane" id="OnProgress">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                                        <table class="table table-head-fixed text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Pendaftaran</th>
                                                                    <th>Pendaftar</th>
                                                                    <th>Pas Foto</th>
                                                                    <th>Tanggal Pendaftaran</th>
                                                                    <th>Status</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php $no = 1; @endphp
                                                                @foreach ($viewData as $x)
                                                                    @if (Auth::user()->email == $x->email)
                                                                        @if ($x->status_pendaftaran == 'Belum Terverifikasi' || $x->status_pendaftaran == 'Terverifikasi')
                                                                            <tr>
                                                                                <td
                                                                                    class="text-primary d-block fs-18 font-w500 mb-1">
                                                                                    <strong>{{ $x->id_pendaftaran }}</strong>
                                                                                </td>
                                                                                <td><strong>{{ $x->nama_lengkap }}</strong>
                                                                                </td>
                                                                                <td><img src="{{ url('/' . $x->pas_foto) }}"
                                                                                        alt="pas foto"
                                                                                        style="width: 40px">
                                                                                </td>
                                                                                <td><strong>{{ $x->tgl_pendaftaran }}</strong>
                                                                                </td>
                                                                                <td><strong>
                                                                                        @if ($x->status_pendaftaran == 'Belum Terverifikasi')
                                                                                            <a href="detail-registration/{{ $x->id_pendaftaran }}"
                                                                                                class=" btn bgl-warning text-warning fs-16 font-w600">Belum
                                                                                                <br> Terverifikasi</a>
                                                                                        @elseif($x->status_pendaftaran == 'Terverifikasi')
                                                                                            <a href="detail-registration/{{ $x->id_pendaftaran }}"
                                                                                                class=" btn bgl-warning text-success fs-16 font-w600">Terverifikasi</a>
                                                                                        @endif
                                                                                    </strong></td>
                                                                                <td><strong><a class="dropdown-item"
                                                                                            href="detail-registration/{{ $x->id_pendaftaran }}">Lihat
                                                                                            Selengkapnya</a>
                                                                                    </strong></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /. tab-pane OnProgress -->

                                        <div class="tab-pane" id="Finish">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                                        <table class="table table-head-fixed text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Pendaftaran</th>
                                                                    <th>Pendaftar</th>
                                                                    <th>Pas Foto</th>
                                                                    <th>Tanggal Pendaftaran</th>
                                                                    <th>Status</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($viewData as $x)
                                                                    @if (Auth::user()->email == $x->email)
                                                                        @if ($x->status_pendaftaran == 'Selesai')
                                                                            <tr>
                                                                                <td
                                                                                    class="text-primary d-block fs-18 font-w500 mb-1">
                                                                                    <strong>{{ $x->id_pendaftaran }}</strong>
                                                                                </td>
                                                                                <td><strong>{{ $x->nama_lengkap }}</strong>
                                                                                </td>
                                                                                <td><img src="{{ url('/' . $x->pas_foto) }}"
                                                                                        alt="pas foto"
                                                                                        style="width: 40px">
                                                                                </td>
                                                                                <td><strong>{{ $x->tgl_pendaftaran }}</strong>
                                                                                </td>
                                                                                <td><strong>
                                                                                        <a href="detail-registration/{{ $x->id_pendaftaran }}"
                                                                                            class=" btn bgl-warning text-success fs-16 font-w600">Selesai</a>
                                                                                    </strong></td>
                                                                                <td><strong><a class="dropdown-item"
                                                                                            href="detail-registration/{{ $x->id_pendaftaran }}">Lihat
                                                                                            Selengkapnya</a>
                                                                                        <a class="dropdown-item"
                                                                                            href="view-announcement/{{ $x->id_pendaftaran }}">Lihat
                                                                                            Hasil Seleksi</a>
                                                                                    </strong></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /. tab-pane Finis -->

                                        <div class="tab-pane" id="Closed">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                                        <table class="table table-head-fixed text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Pendaftaran</th>
                                                                    <th>Pendaftar</th>
                                                                    <th>Pas Foto</th>
                                                                    <th>Tanggal Pendaftaran</th>
                                                                    <th>Status</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($viewData as $x)
                                                                    @if (Auth::user()->email == $x->email)
                                                                        @if ($x->status_pendaftaran == 'Tidak Sah')
                                                                            <tr>
                                                                                <td
                                                                                    class="text-primary d-block fs-18 font-w500 mb-1">
                                                                                    <strong>{{ $x->id_pendaftaran }}</strong>
                                                                                </td>
                                                                                <td><strong>{{ $x->nama_lengkap }}</strong>
                                                                                </td>
                                                                                <td><img src="{{ url('/' . $x->pas_foto) }}"
                                                                                        alt="pas foto"
                                                                                        style="width: 40px">
                                                                                </td>
                                                                                <td><strong>{{ $x->tgl_pendaftaran }}</strong>
                                                                                </td>
                                                                                <td><strong>
                                                                                        <a href="detail-registration/{{ $x->id_pendaftaran }}"
                                                                                            class=" btn bgl-warning text-danger fs-16 font-w600">Tidak
                                                                                            Sah</a>
                                                                                    </strong></td>
                                                                                <td><strong><a class="dropdown-item"
                                                                                            href="detail-registration/{{ $x->id_pendaftaran }}">Lihat
                                                                                            Selengkapnya</a>
                                                                                    </strong></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /. tab-pane Closed -->

                                        @php
                                            $no = $no + 1;
                                        @endphp
                                    </div>
                                    @if ($no == 0)
                                        <div class="alert alert-info alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            <i class="icon fas fa-info"></i><strong>Haii!</strong> Kamu belum melakukan
                                            pendaftaran silahkan daftar dan
                                            ikuti proses
                                            kegiatannya ya.
                                        </div>
                                    @endif
                                    <!-- /. alert Info belum ada pendaftaran -->
                                </div>
                                <!-- /. card-body -->


                            </div>
                        </div>
                    </div>
                @endif
                {{-- @endif User --}}
            </div>
        </section>
    </div>
@endsection
