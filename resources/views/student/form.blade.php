@extends('layoutdashboard.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Formulir Pendaftaran</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="/save-registration" method="POST" enctype="multipart/form-data">  
        
        
        <!-- Identitas Calon Siswa -->
        <div class="card card-default">

          <div class="card-header">
            <h3 class="card-title">Identitas Calon Siswa</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nama Panggilan</label>
                  <input style="width: 100%;" class="form-control" required name="firstName" id="inputNamaPanggilan">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" disabled="disabled" value="{{ Auth::user()->profile->nama }}" style="width: 100%" class="form-control" id="inputNamaLengkap">
                </div>              
              </div>
              <div class="col-md-6">
                <label>Jenis Kelamin</label>
                <select class="form-control" style="width: 100%;" name="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" id="inputTempatLahir" value="{{ Auth::user()->profile->tempat_lahir }}" placeholder="Tempat Lahir" name="tempat_lahir">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ Auth::user()->profile->tanggal_lahir }}" name="tanggal_lahir">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Anak Ke -</label>
                <select class="form-control" style="width: 100%;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="other">Lain-nya</option>
                  </select>
              </div>
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-md-3">
                <label for="">Agama</label>
                <select class="form-control" style="width: 100%;" name="agama">
                    <option value="">Pilih Agama</option>
                    <option value="islam">Islam</option>
                    <option value="kristen protestan">Kristen Protestan</option>
                    <option value="kristen katolik">Kristen Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="buddha">Buddha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
              </div>
              <div class="col-md-3">
                <label>Jumlah Saudara</label>
                <input type="text" class="form-control" name="jumlah_saudara"/>
              </div>
              <div class="col-md-6">
                <label for="">Anak Tinggal Bersama</label>
                <select class="form-control" style="width: 100%;">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                  </select>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->

          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputFile">Pas Foto Calon Siswa</label>
              <div class="input-group">
                <div class="form-file">
                  <input type="file" class="form-file-input form-control" id="exampleInputFile" name="foto" value="{{ old('foto') }}" accept="image/png, image/jpg, image/jpeg" required>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>            
          </div>
          <!-- /.card-body -->


        </div>
        <!-- /.card -->

        
        
        <!-- Identitas Calon Wali Siswa -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Identitas Orang Tua / Wali Calon Siswa</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nama Panggilan</label>
                  <input style="width: 100%;" class="form-control" required name="firstName" id="inputNamaPanggilan">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" disabled="disabled" value="{{ Auth::user()->profile->nama }}" style="width: 100%" class="form-control" id="inputNamaLengkap">
                </div>              
              </div>
              <div class="col-md-6">
                <label>Jenis Kelamin</label>
                <select class="form-control" style="width: 100%;" name="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" id="inputTempatLahir" value="{{ Auth::user()->profile->tempat_lahir }}" placeholder="Tempat Lahir" name="tempat_lahir">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ Auth::user()->profile->tanggal_lahir }}" name="tanggal_lahir">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Anak Ke -</label>
                <select class="form-control" style="width: 100%;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="other">Lain-nya</option>
                  </select>
              </div>
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-md-3">
                <label for="">Agama</label>
                <select class="form-control" style="width: 100%;" name="agama">
                    <option value="">Pilih Agama</option>
                    <option value="islam">Islam</option>
                    <option value="kristen protestan">Kristen Protestan</option>
                    <option value="kristen katolik">Kristen Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="buddha">Buddha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
              </div>
              <div class="col-md-3">
                <label>Jumlah Saudara</label>
                <input type="text" class="form-control" name="jumlah_saudara"/>
              </div>
              <div class="col-md-6">
                <label for="">Anak Tinggal Bersama</label>
                <select class="form-control" style="width: 100%;">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                  </select>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>



        <!-- Kesehatan Calon Siswa -->
        <div class="card card-default">

          <div class="card-header">
            <h3 class="card-title">Kesehatan Calon Siswa</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Penyakit Pasca Lahiran Anak (Jika Ada)</label>
                  <textarea class="form-control" name="penyakit_anak" rows="2" placeholder="Ceritakan... "></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Makanan pada masa <br> bayi (0-6 bulan)</label>
                  <select class="form-control" style="width: 100%;" name="makanan_bayi">
                      <option value="">Pilih Makanan Bayi</option>
                      <option value="asi">Asi</option>
                      <option value="susuformula">Susu Formula</option>
                      <option value="other">Lain-nya</option>
                  </select>                  
                </div>              
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Apakah anak menerima obat tertentu disaat kondisi tertentu ?</label>
                  <select class="form-control" style="width: 100%;" name="penyakit_kambuh">
                      <option value="">Pilih Ya / Tidak</option>
                      <option value="laki-laki">Ya</option>
                      <option value="perempuan">Tidak</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>



        <!-- Tombol Daftar -->
        <div class="row my-4">
          <div class="col">
            <div class="text-end mt-2 mt-sm-0 mb-2">
              <button type="submit" name="add" class="btn btn-primary">Buat Pendaftaran</button>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- /.row -->
      </form>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection