<!DOCTYPE html>
<html lang="en">

@extends('layouts.head')

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="#"><img src="{{ asset('assets/img/Logo.jpg') }}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ url('/home') }}">Home</a></li>
          <li class="dropdown"><a href=""><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#about">Sejarah Sekolah</a></li>
              <li><a href="#">Visi & Misi</a></li>
              <li><a href="#contact">Kontak Kami</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Pendaftaran</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('/jadwal-pendaftaran') }}">Jadwal Pendaftaran</a></li>
              <li><a href="{{ url('/alur-pendaftaran') }}">Alur Pendaftaran</a></li>
            </ul>
          </li>
          <li><a href="{{ url('/login') }}" class="getstarted scrollto">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  @yield('hero')

  <main id="main">
    @yield('main')
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Rizal</strong>. All Rights Reserved {{ date('Y') }}
          </div>
        </div>
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            Made With <span>❤</span> by Rizal
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('/assets/js/main.js') }}"></script>

</body>

</html>