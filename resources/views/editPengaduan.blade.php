@extends('layout.header');
@extends('layout.sidemenu');

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
        <h1>Ubah Pengaduan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="../datapengaduan">Data Pengaduan</a></li>
            <li class="breadcrumb-item">Ubah Pengaduan</li>
          </ol>
        </nav>
    </div>
      <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body py-4 px-3">
                  <form class="row g-3" novalidate action="../../updatePengaduan" method="post">
                    @csrf
                    <input type="hidden" name="id_Pengaduan" value="{{ $data[0]->id_Pengaduan }}">
                    <div class="col-md-6">
                      <label for="id_Pelanggan" class="form-label">Id Pelanggan</label>
                      <input type="text" class="form-control" id="id_Pelanggan" name="id_Pelanggan" value="{{ $data[0]->id_Pelanggan }}">
                    </div>
                    <div class="col-md-6">
                      <label for="nama_Pelanggan" class="col-form-label">Nama Pelanggan</label>
                      <input type="text" class="form-control" name="nama_Pelanggan" value="{{ $data[0]->nama_Pelanggan }}">
                    </div>
                    <div class="col-md-6">
                      <label for="email_Pelanggan" class="col-form-label">Email Pelanggan</label>
                      <input type="email" class="form-control" name="email_Pelanggan" value="{{ $data[0]->email_Pelanggan }}">
                    </div>
                    <div class="col-md-6">
                      <label for="hp_Pelanggan" class="col-form-label">Nomor HP Pelanggan</label>
                      <input type="number" class="form-control" name="hp_Pelanggan" value="{{ $data[0]->nomor_HP_Pelanggan }}">
                    </div>
                    <div class="col-md-6">
                      <label for="jenis_Pengaduan" class="col-form-label">Jenis Pengaduan</label>
                          <select class="form-select " name="jenis_Pengaduan"> 
                            @foreach ($jenis as $jns)
                              <option value="{{ $jns->nama_jpengaduan }}"
                                @if ($jns->nama_jpengaduan == $data[0]->jenis_Pengaduan )
                                   {{ 'selected'}}
                                @endif
                                >{{ $jns->nama_jpengaduan }}</option> 
                            @endforeach
                          </select>                    </div>
                    <div class="col-md-6">
                      <label for="jenis_kiriman" class="col-form-label">Jenis Kiriman</label>
                          <select class="form-select " name="jenis_kiriman"> 
                            @foreach ($produk as $prod)
                              <option value="{{ $prod->nama_produk }}"
                                @if ($prod->nama_produk == $data[0]->jenis_Kiriman )
                                   {{'selected'}}
                                @endif
                                >{{ $prod->nama_produk }}</option> 
                            @endforeach
                          </select>
                    </div>
                    <div class="col-md-4">
                      <label for="nomor_Resi" class="col-form-label">Nomor Resi</label>
                      <input type="text" class="form-control" name="nomor_Resi" value="{{ $data[0]->nomor_Resi }}">
                    </div>
                    <div class="col-md-4">
                      <label for="kantor_Asal_Kirim" class="col-form-label">Kantor Asal</label>
                      <input type="text" class="form-control" name="kantor_Asal_Kiriman" value="{{ $data[0]->Kantor_Asal_Kiriman }}">
                    </div>
                    <div class="col-md-4">
                      <label for="kantor_Tujuan_Kirim" class="col-form-label">Kantor Tujuan</label>
                      <input type="text" class="form-control" name="kantor_Tujuan_Kiriman" value="{{ $data[0]->Kantor_Tujuan_Kiriman }}">
                    </div>
                    <div class="col-md-6">
                      <label for="status" class="col-form-label">Status</label>
                        <select class="form-select " name="status"> 
                          @foreach ($status as $st)
                            <option value="{{ $st->status }}"
                              @if ($st->status == $data[0]->status )
                                  {{'selected'}}
                              @endif
                              >{{ $st->status }}</option> 
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                      <label for="sumber_pengaduan" class="col-form-label">Sumber Pengaduan</label>
                          <select class="form-select " name="sumber_pengaduan"> 
                            @foreach ($sumber as $sm)
                              <option value="{{ $sm->sumber_pengaduan }}"
                                @if ($sm->sumber_pengaduan == $data[0]->sumber_Pengaduan )
                                   {{'selected'}}
                                @endif
                                >{{ $sm->sumber_pengaduan }}</option> 
                            @endforeach
                          </select>
                    </div>
                    <div class="col-12">
                      <label for="isi_Pengaduan" class="col-form-label">Isi Pengaduan</label>
                      <textarea class="form-control" name="isi_Pengaduan">{{ $data[0]->isi_Pengaduan }}</textarea>
                    </div>
                    <div class="col-12">
                      <label for="respon_admin" class="col-form-label">Respon Admin</label>
                      <textarea class="form-control" name="respon_admin">{{ $data[0]->respon_admin }}</textarea>
                    </div>
                    <input type="hidden" name="updated_by" value="{{ auth()->user()->username }}">

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck">
                          Data yang diisikan sudah benar.
                        </label>
                      </div>
                    </div>
                    <div class="col-md-auto ms-auto">

                    </div>
                    <div class="col-md-auto">
                      <a href="../detailPengaduan/{{ $data[0]->id_Pengaduan }}" class="btn btn-outline-primary btn-sm ms-1"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                      <button type="submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-save"></i> Simpan</button>
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
    @if (Session::has('successDelete'))
      toastr.success("{{ Session::get('successDelete') }}")
    @endif 
  </script>