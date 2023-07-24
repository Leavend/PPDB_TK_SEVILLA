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
                {{-- <div class="row">
              <div class="col-12">
                <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-12">
                      <h4>
                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                        <small class="float-right">Date: 2/10/2014</small>
                      </h4>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      From
                      <address>
                        <strong>Admin, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      To
                      <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice #007612</b><br>
                      <br>
                      <b>Order ID:</b> 4F3S8J<br>
                      <b>Payment Due:</b> 2/22/2014<br>
                      <b>Account:</b> 968-34567
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Table row -->
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>Qty</th>
                          <th>Product</th>
                          <th>Serial #</th>
                          <th>Description</th>
                          <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>1</td>
                          <td>Call of Duty</td>
                          <td>455-981-221</td>
                          <td>El snort testosterone trophy driving gloves handsome</td>
                          <td>$64.50</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Need for Speed IV</td>
                          <td>247-925-726</td>
                          <td>Wes Anderson umami biodiesel</td>
                          <td>$50.00</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Monsters DVD</td>
                          <td>735-845-642</td>
                          <td>Terry Richardson helvetica tousled street art master</td>
                          <td>$10.70</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Grown Ups Blue Ray</td>
                          <td>422-568-642</td>
                          <td>Tousled lomo letterpress</td>
                          <td>$25.99</td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                      <p class="lead">Payment Methods:</p>
                      <img src="../../dist/img/credit/visa.png" alt="Visa">
                      <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                      <img src="../../dist/img/credit/american-express.png" alt="American Express">
                      <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                        plugg
                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                      </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                      <p class="lead">Amount Due 2/22/2014</p>

                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                          </tr>
                          <tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                          </tr>
                          <tr>
                            <th>Shipping:</th>
                            <td>$5.80</td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td>$265.24</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-12">
                      <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                      <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                      </button>
                      <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                      </button>
                    </div>
                  </div>
                </div>
                <!-- /.invoice -->
              </div><!-- /.col -->
            </div>
            <!-- /.row --> --}}
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
