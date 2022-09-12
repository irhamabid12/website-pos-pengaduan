@extends('layout.header')
@extends('layout.sidemenu')
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Bantuan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Bantuan</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-search me-3"></i>Cek Resi</h5>
                    <p>Lacak keberadaan paket mengetik nomor resi dibawah ini</p>
                    <form class="row g-3 needs-validation" novalidate> 
                        <input type="text" name="resi" class="form-control" placeholder="Ketikan nomor resi" id="awb_input" required>
                        <div class="invalid-feedback">Tolong, masukkan nomor resi!</div>
                        <button class="btn text-white w-50" style="background-color: #FF6F00;" type="button" id="cek-resi">Cek resi</button>  
                    </form>
                    <div class="row tes" id="resi-status">
                      

                    </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-calculator-fill me-3"></i>Cek Tarif</h5>
                    <form class="row g-3 needs-validation" novalidate> 
                        <div class="input-group">
                            <input type="text" name="origin" class="form-control" id="origin" placeholder="Kota asal" required>
                            <div id="originList"></div>
                        </div>
                        
                        <div class="input-group">
                            <input type="text" name="destination" class="form-control" id="destination" placeholder="Kota Tujuan" required>
                            <div id="destinationlist"></div>
                        </div>

                        <div class="input-group">
                            <input type="text" name="berat" class="form-control" id="berat" placeholder="Berat" required>
                            <span class="input-group-text" id="basic-addon2">Kg</span>
                        </div>
                        <button class="btn text-white w-50" style="background-color: #FF6F00;" type="submit" id="cek-tarif" >Cek Tarif</button>  
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    </main>
    <!-- End #main -->
    <script src="{{ asset('assets/js/ajax/cek-resi.js') }}"></script>
    <script src="{{ asset('assets/js/ajax/cek-tarif.js') }}"></script>
    
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>