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
      <form action="{{ route('save-registration') }}" method="post" enctype="multipart/form-data">  
        @csrf
        <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
        <!-- Identitas Calon Siswa -->
        <div class="card card-default">
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
          <input type="hidden" name="id" value="{{ auth()->user()->id }}">
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
                  <input style="width: 100%;" class="form-control" required name="nama_panggilan" id="inputNamaPanggilan">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  @if (Auth::user()->profile->nama  != null)
                  <input type="text" disabled="disabled" value="{{ Auth::user()->profile->nama }}" style="width: 100%" class="form-control" id="inputNamaLengkap" name="nama_lengkap">
                  @else
                  <input type="text" value="{{ old('nama_lengkap') }}" style="width: 100%" class="form-control" id="inputNamaLengkap" name="nama_lengkap">
                  @endif
                </div>              
              </div>
              <div class="col-md-6">
                <label>Jenis Kelamin</label>
                <select class="form-control" style="width: 100%;" name="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
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

          <div class="card-footer">
            <h6 style="color: red">Pas Foto Siswa Berformat PNG, JPG, JPEG</h6>
          </div>


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

                <!-- Data Ayah -->
                <div class="col-md-6">
        
                  <div class="card-header">
                    <h3 class="card-title" style="font-weight: bold">Data Ayah</h3>
                  </div>
                  <!-- /.card-header ayah -->

                  <div class="card-body">

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">🧑 Nama Ayah</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" value="{{ old('nama_ayah') }}" required>
                    </div>
                    <!-- /.Nama -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">👨‍🎓 Pendidikan Ayah</span>
                      </div>
                      <input class="form-control" list="datalistOptionsOccupationStudy" id="exampleDataList" placeholder="Masukkan Pendidikan Terakhir..." name="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}" required>
                      <datalist id="datalistOptionsOccupationStudy">
                        <option value="SD"></option>
                        <option value="SMP/MTS"></option>
                        <option value="SMA/MA/SMK"></option>
                        <option value="D3"></option>
                        <option value="D4"></option>
                        <option value="S1"></option>
                        <option value="S2"></option>
                        <option value="S3"></option>
                      </datalist>
                    </div>
                    <!-- /.Pendidikan -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">👷‍♂️ Pekerjaan Ayah</span>
                      </div>
                      <input class="form-control" list="datalistOptionsOccupationWork" id="exampleDataList" placeholder="Masukkan Jenis Pekerjaan..." name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required>
                      <datalist id="datalistOptionsOccupationWork">
                        <option value="Karyawan Swasta"></option>
                        <option value="Karyawan BUMN"></option>
                        <option value="Karyawan BUMD"></option>
                        <option value="Karyawan Honorer"></option>
                        <option value="PNS"></option>
                        <option value="Wirausaha"></option>
                        <option value="PNS"></option>
                        <option value="Buruh"></option>
                        <option value="Asisten Rumah Tangga"></option>
                        <option value="Seniman"></option>
                        <option value="Dokter"></option>
                        <option value="Perawat"></option>
                        <option value="Bidan"></option>
                        <option value="Apoteker"></option>
                        <option value="Pengajar"></option>
                        <option value="Notaris"></option>
                      </datalist>
                    </div>
                    <!-- /.Pekerjaan -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">💰 Penghasilan Ayah</span>
                      </div>                 
                      <input class="form-control" list="datalistOptionsOccupationMoney" id="exampleDataList" placeholder="Masukkan Penghasilan..." name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}" required>
                      <datalist id="datalistOptionsOccupationMoney">
                        <option value="1000000-2000000"></option>
                        <option value="2000000-3000000"></option>
                        <option value="3000000-4000000"></option>
                        <option value="5000000-1000000"></option>
                      </datalist>
                    </div>
                    <!-- /.Penghasilan -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">🗺 Alamat</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Masukkan Alamat..." name="alamat" value="{{ old('alamat') }}" required>
                    </div>
                    <!-- /.Alamat -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">📱 No HP Ayah</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Masukkan No HP..." name="no_hp_ayah" value="{{ old('no_hp_ayah') }}" required>
                    </div>
                    <!-- /.no_hp_ayah -->

                  </div>
                  <!-- /.card-body -->

                </div>
                <!-- /.card -->
                  
                
                <!-- Data Ibu -->
                <div class="col-md-6">
        
                  <div class="card-header">
                    <h3 class="card-title" style="font-weight: bold">Data Ibu</h3>
                  </div>
                  <!-- /.card-header -->

                  <div class="card-body">

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">👩 Nama Ibu</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
                    </div>
                    <!-- /.Nama -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">👩‍🎓 Pendidikan Ibu</span>
                      </div>
                      <input class="form-control" list="datalistOptionsOccupationStudy" id="exampleDataList" placeholder="Masukkan Pendidikan Terakhir..." name="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}" required>
                      <datalist id="datalistOptionsOccupationStudy">
                        <option value="SD"></option>
                        <option value="SMP/MTS"></option>
                        <option value="SMA/MA/SMK"></option>
                        <option value="D3"></option>
                        <option value="D4"></option>
                        <option value="S1"></option>
                        <option value="S2"></option>
                        <option value="S3"></option>
                      </datalist>
                    </div>
                    <!-- /.Pendidikan -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">👷‍♀️ Pekerjaan Ibu</span>
                      </div>
                      <input class="form-control" list="datalistOptionsOccupationWork" id="exampleDataList" placeholder="Masukkan Jenis Pekerjaan..." name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required>
                      <datalist id="datalistOptionsOccupationWork">
                        <option value="Karyawan Swasta"></option>
                        <option value="Karyawan BUMN"></option>
                        <option value="Karyawan BUMD"></option>
                        <option value="Karyawan Honorer"></option>
                        <option value="PNS"></option>
                        <option value="Wirausaha"></option>
                        <option value="PNS"></option>
                        <option value="Buruh"></option>
                        <option value="Asisten Rumah Tangga"></option>
                        <option value="Seniman"></option>
                        <option value="Dokter"></option>
                        <option value="Perawat"></option>
                        <option value="Bidan"></option>
                        <option value="Apoteker"></option>
                        <option value="Pengajar"></option>
                        <option value="Notaris"></option>
                      </datalist>
                    </div>
                    <!-- /.Pekerjaan -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">💰 Penghasilan Ibu</span>
                      </div>                 
                      <input class="form-control" list="datalistOptionsOccupationMoney" id="exampleDataList" placeholder="Masukkan Penghasilan..." name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}" required>
                      <datalist id="datalistOptionsOccupationMoney">
                        <option value="1000000-2000000"></option>
                        <option value="2000000-3000000"></option>
                        <option value="3000000-4000000"></option>
                        <option value="5000000-1000000"></option>
                      </datalist>
                    </div>
                    <!-- /.Penghasilan -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">🗺 Alamat</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Masukkan Alamat..." name="alamat" value="{{ old('alamat') }}" required>
                    </div>
                    <!-- /.Alamat -->

                    <div class="form-group mb-3">
                      <div class="form-group-prepend">
                        <span class="input-group-text">📱 No HP Ibu</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Masukkan No HP..." name="no_hp_ibu" value="{{ old('no_hp_ibu') }}" required>
                    </div>
                    <!-- /.no_hp -->




                    <!-- /.Penghasilan -->

                  </div>
                  <!-- /.card-body -->

                </div>
                <!-- /.card -->

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
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="submit" name="add" class="btn btn-primary mb-5 active" data-bs-toggle="button" aria-pressed="true">Buat Pendaftaran</button>
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