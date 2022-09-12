{{-- @extends('layout.header')
@extends('layout.sidemenu') --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
  {{-- jquery --}}
  <script src="{{ asset('assets/js/jquery.js') }}"></script>

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  {{-- css toastr --}}
  <link rel="stylesheet" href="{{ asset('assets/css/toastr.css')}}"" />
</head>

<body>

  <main id="main" class="main">
    <section class="section dataPengaduan">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <img src="img/logo-pos-untuk-anda.jpg" class="img-fluid rounded-start align-middle mt-4">
                </div>
                <div class="col-lg-6">
                  <form class="row g-3 needs-validation mt-2" novalidate action="/store/akun" method="post">
                    @csrf
                    <div class="col-6">
                      <label for="yourName" class="form-label">Nama Lengkap</label>
                      <input type="text" name="name" class="form-control form-control-sm" id="yourName" required>
                      <div class="invalid-feedback">Tolong, masukkan nama anda!</div>
                    </div>
  
                    <div class="col-3">
                      <label for="nipPos" class="form-label">Nippos</label>
                      <input type="text" name="nipPos" class="form-control form-control-sm" id="nipPos" required>
                      <div class="invalid-feedback">Tolong, masukkan Nippos anda!</div>
                    </div>
                    
                    <div class="col-3">
                      <label for="jabatan" class="form-label">Jabatan</label>
                      <select class="form-select form-select-sm" name="jabatan" id="jabatan" aria-label=".form-select-sm example" required>
                        <option value="" selected>Pilih Jabatan</option>
                        <option value="Direktur">Direktur</option>
                        <option value="Manager">Manager</option>
                        <option value="Staff">Staff</option>
                      </select>
                      <div class="invalid-feedback">Tolong, pilih jabatan anda!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control form-control-sm" id="yourEmail" required>
                      <div class="invalid-feedback">Tolong, masukkan email anda!</div>
                    </div>
                    
  
                    <div class="col-6">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control form-control-sm" id="yourUsername" required>
                        <div class="invalid-feedback">Tolong buat username anda!.</div>
                      </div>
                    </div>

                    <div class="col-6">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control form-control-sm" id="yourPassword" required>
                      <div class="invalid-feedback">Tolong masukkan password!</div>
                    </div>
  
                    <div class="col-6">
                      <label for="confirmasiPassword" class="form-label">Konfirmasi Password</label>
                      <input type="password" name="confirmasiPassword" class="form-control form-control-sm" id="confirmasiPassword" required>
                      <div class="invalid-feedback">Tolong lakukan confirmasi password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Data yang saya isikan sudah benar</label>
                        <div class="invalid-feedback">validasi data terlebih dahulu!</div>
                      </div>
                    </div>
                    <div class="col-12 mt-5">
                      <button class="btn text-white w-100" name="store" style="background-color: #FF6F00;" type="submit">Buat Akun</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah punya akun? <a href="login">Login</a></p>
                    </div>
                  </form>
                </div>
              </div>
                
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  {{-- js toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

@if (Session::has('success'))
  toastr.success("{{ Session::get('success') }}")
@endif
@if (Session::has('error'))
  toastr.error("{{ Session::get('error') }}")
@endif

@if (Session::has('errorInsert'))
  toastr.error("{{ Session::get('errorInsert') }}")
@endif

@if (Session::has('doubleEmail'))
  toastr.error("{{ Session::get('doubleEmail') }}")
@endif
@if (Session::has('doubleUsername'))
  toastr.error("{{ Session::get('doubleUsername') }}")
@endif
@if (Session::has('doubleNippos'))
  toastr.error("{{ Session::get('doubleNippos') }}")
@endif
</script>
</html>
