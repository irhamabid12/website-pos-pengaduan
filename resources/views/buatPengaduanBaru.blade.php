@extends('layout.header');
{{-- @extends('layout.sidemenu'); --}}

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
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Buat Pengaduan Baru</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="datapengaduan">Data Pengaduan</a></li>
            <li class="breadcrumb-item">Buat Pengaduan Baru</li>
          </ol>
        </nav>
    </div>
      <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate action="insertPengaduan" method="post">
                      @csrf
                        <div class="col-6">
                          <label for="id_Pelanggan" class="col-form-label">Nomor Id Pelanggan</label>
                          <input type="text" class="form-control" name="id_Pelanggan" required>
                        </div>

                        <div class="col-6">
                            <label for="nama_Pelanggan" class="col-form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_Pelanggan" required>
                          </div>

                        <div class="col-6">
                          <label for="email_Pelanggan" class="col-form-label">Email Pelanggan</label>
                          <input type="email" class="form-control" name="email_Pelanggan" required>
                        </div>

                        <div class="col-6">
                            <label for="hp_Pelanggan" class="col-form-label">Nomor HP Pelanggan</label>
                            <input type="telp" class="form-control" name="hp_Pelanggan" required>
                        </div>

                        <div class="col-6">
                          <label for="jenis_Pengaduan" class="col-form-label">Jenis Pengaduan</label>
                          <select class="form-select mb-3" name="jenis_Pengaduan" required> 
                            @foreach ($jenis as $jns)
                              <option value="{{ $jns->nama_jpengaduan }}">{{ $jns->nama_jpengaduan }}</option> 
                            @endforeach
                          </select>
                        </div>

                        <div class="col-6">
                          <label for="jenis_Produk" class="col-form-label">Jenis Produk</label>
                          <select class="form-select mb-3" name="jenis_Produk" required> 
                            @foreach ($produk as $prod)
                              <option value="{{ $prod->nama_produk }}">{{ $prod->nama_produk }}</option> 
                            @endforeach
                          </select>
                        </div>

                        <div class="col-4">
                          <label for="nomor_Resi" class="col-form-label">Nomor Resi</label>
                          <input type="text" class="form-control" name="nomor_Resi" required>
                        </div>

                        <div class="col-4">
                          <label for="kantor_Asal_Kirim" class="col-form-label">Kantor Asal</label>
                          <input type="text" class="form-control" name="kantor_Asal_Kiriman" required>
                        </div>

                        <div class="col-4">
                            <label for="kantor_Tujuan_Kirim" class="col-form-label">Kantor Tujuan</label>
                            <input type="text" class="form-control" name="kantor_Tujuan_Kiriman" required>
                        </div>

                        <div class="col-12">
                            <label for="isi_Pengaduan" class="col-form-label">Isi Pengaduan</label>
                            <textarea class="form-control" name="isi_Pengaduan"></textarea>
                        </div>
                        <div class="col-12">
                          <label for="respon_admin" class="col-form-label">Respon Admin</label>
                          <textarea class="form-control" name="respon_admin"></textarea>
                        </div>
                        <input type="hidden" name="added_By" value="{{ auth()->user()->username }}">
                        <input type="hidden" name="device" value="website">
                        <input type="hidden" name="status" value="BELUM SELESAI">

                        <div class="col-md-auto  ms-auto"></div>
                        <div class="col-md-auto">
                          <a href="../datapengaduan" class="btn btn-outline-primary btn-sm ms-1"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                          <button type="submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-box-arrow-down"></i> Simpan</button>
                        </div>
                         

                      </form>
                </div>
            </div>
        </div>
    </section>
</main>
{{-- js toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

  {{-- js toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <script>
  // toastr.success('Have fun storming the castle!', 'Miracle Max Says');
    @if (Session::has('successInsert'))
      toastr.success("{{ Session::get('successInsert') }}")
    @endif
    @if (Session::has('errorInsert'))
      toastr.error("{{ Session::get('errorInsert') }}")
    @endif  
  </script>