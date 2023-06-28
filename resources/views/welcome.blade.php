@extends('layouts.head')
@extends('layouts.ui')

@section('title')
PPDB
@endsection

@section('hero')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">PPDB Online</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Ayo Segera Daftar Kuota Terbatas !</h2>
          <h1 data-aos="fade-up" data-aos-delay="400">TK Sevilla</h1>
          <h4 data-aos="fade-up" data-aos-delay="400"><strong>Jika belum mempunyai akun DAFTAR terlebih dahulu.</strong></h4>
          <div data-aos="fade-up" data-aos-delay="700"> 
            <a href="{{ url('/register') }}" class="btn-get-started scrollto">Daftar | Siswa</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="{{ asset('/assets/img/hero-img2.png') }}" class="img-fluid animated" alt="hero-img">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
@endsection

@section('main')
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Tentang Kami</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            {{-- <a href="#" class="btn-learn-more">Learn More</a> --}}
          </div>
        </div>

      </div>
    </section>
    <!-- End About Us Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Kontak Kami</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>Adios!</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>Jl. Margo Mulyo<br>Kecamatan Balikpapan Barat<br>Kota Balikpapan<br>Kalimantan Timur 76125</p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>eqoco@eqoco.com</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p>+62 895 123 123 123</p>
              </div>

            </div>
          </div>
          <!-- Start Map -->
          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.9080579886468!2d116.82555627421607!3d-1.2239188355595603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df147dbdbeb9d03%3A0x7442803484c68a0!2sTK%20ISLAM%20SEVILLA%20AL%20FATAH!5e0!3m2!1sid!2sid!4v1686664605794!5m2!1sid!2sid" width="550" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <!-- End Map -->
        </div>

      </div>
    </section>
    <!-- End Contact Section -->


@endsection