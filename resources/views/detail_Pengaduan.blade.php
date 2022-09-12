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
  <link rel="stylesheet" href="{{ asset('assets/css/toastr.css')}}">
</head>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail Pengaduan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="../datapengaduan">Data Pengaduan</a></li>
            <li class="breadcrumb-item active">Detail Pengaduan</li>
        </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <div class="row g-3">
                          <div class="col-md-12">
                            <h6 class="card-title">Data Pelanggan</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->id_Pengaduan }}</h6>
                              <h6 class="sub-card-title">Id Pengaduan</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->id_Pelanggan }}</h6>
                              <h6 class="sub-card-title">Id Pelanggan</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->nama_Pelanggan }}</h6>
                              <h6 class="sub-card-title">Nama Pelanggan</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->nomor_HP_Pelanggan }}</h6>
                              <h6 class="sub-card-title">Nomor HP Pelanggan</h6>
                          </div>
                          <div class="col-md-4">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->email_Pelanggan }}</h6>
                              <h6 class="sub-card-title">Email Pelanggan</h6>
                          </div>
                          <hr class="dropdown-divider mb-2">

                          <div class="col-md-12">
                            <h6 class="card-title">Data Pengaduan</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->nomor_Resi }}</h6>
                              <h6 class="sub-card-title">Nomor Resi</h6>
                          </div>
                          <div class="col-md-2">
                            <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->Kantor_Asal_Kiriman }}</h6>
                            <h6 class="sub-card-title">Kantor Asal Kiriman</h6>
                        </div>
                        <div class="col-md-2">
                            <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->Kantor_Tujuan_Kiriman }}</h6>
                            <h6 class="sub-card-title">Kantor Tujuan Kiriman</h6>
                        </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->jenis_Kiriman }}</h6>
                              <h6 class="sub-card-title">Jenis Kiriman</h6>
                          </div>
                          <div class="col-md-4">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->jenis_Pengaduan }}</h6>
                              <h6 class="sub-card-title">Jenis Pengaduan</h6>
                          </div>
                          
                          <div class="col-md-2 mt-4">
                              <h6><span 
                                  @php
                                      if($datas[0]->status== 'SELESAI'){
                                      echo 'class="badge bg-success"';
                                  }
                                  elseif ($datas[0]->status == 'BELUM DITANGANI' || $datas[0]->status == 'BELUM SELESAI' ) {
                                      echo 'class="badge bg-danger"';
                                  }
                                  elseif ($datas[0]->status== 'PENGAJUAN GANTI RUGI') {
                                      echo 'class="badge bg-info text-dark"';
                                  }
                                  else {
                                      echo 'class="badge bg-primary"';
                                  }  
                                  @endphp
                                  
                                  >{{ $datas[0]->status }}</span></h4>
                              <h6 class="sub-card-title">Status</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->sumber_Pengaduan }}</h6>
                              <h6 class="sub-card-title">Sumber Pengaduan</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->ditambah_Oleh }}</h6>
                              <h6 class="sub-card-title">Pembuat</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->created_at }}</h6>
                              <h6 class="sub-card-title">Tanggal Dibuat</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->diubah_Oleh }}</h6>
                              <h6 class="sub-card-title">Pengubah</h6>
                          </div>
                          <div class="col-md-2">
                              <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->updated_at }}</h6>
                              <h6 class="sub-card-title">Tanggal Diubah</h6>
                          </div>
                          <hr class="dropdown-divider mb-2">

                          <div class="col-md-12">
                            <h6 class="card-title">Isi Pengaduan</h6>
                          </div>
                          <div class="col-md-4">
                            <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->isi_Pengaduan }}</h6>
                            <h6 class="sub-card-title">Isi Pengaduan</h6>
                        </div>
                        <div class="col-md-4">
                            <h6 class="sub-card-title fw-bold text-dark">{{ $datas[0]->respon_admin }}</h6>
                            <h6 class="sub-card-title">Respon Admin</h6>
                        </div>
                        <div class="col-md-12 mb-2">
                          <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="bi bi-telegram me-1"></i>Kirim Respon Pengadauan</button>
                            {{-- <a href="../editPengaduan/{{$datas[0]->id_Pengaduan }}" type="button" class="btn btn-outline-dark btn-sm"><i class="bi bi-pencil-square fs-5"></i></a>
                            <a href="deletePengaduan/{{$datas[0]->id_Pengaduan }}"type="button" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash-fill fs-5"></i></a>--}}
                        </div>
                        <hr class="dropdown-divider mb-2">

                        <div class="col-md-12">
                          <h6 class="card-title">Respon Pengaduan</h6>
                        </div>
                        <div class="col-md-12">
                          <a href="{{ url('../buatPengajuanGantiRugi/'.$datas[0]->id_Pengaduan.'/') }}" 
                            class="mt-2 sub-card-title fw-bold text-dark hover-primary">
                            <i class="bi bi-folder2-open"></i> Ajukan Ganti Rugi</i>
                          </a>
                          <hr class="dropdown-divider mb-2">
                          <a href="../datapengaduan" 
                            class="">
                            <i class="bi bi-caret-left-fill"></i> Kembali</i>
                          </a>
                        </div>
                      </div>
                  </div>                     
                    {{-- modal send message --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h6 class="card-title" id="exampleModalLabel">Respon Pengaduan</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="../sendResponse" method="post">
                                @csrf
                                <input type="hidden" name="idPengaduan" value="{{ $datas[0]->id_Pengaduan }}">
                              <div class="mb-3">
                                <label for="idPelanggan" class="col-form-label">ID Pelanggan</label>
                                <input type="text" class="form-control" id="idPelanggan" name="idPelanggan" value="{{ $datas[0]->id_Pelanggan }}">
                              </div>
                              <div class="mb-3">
                                <label for="response" class="col-form-label">Respon</label>
                                <textarea class="form-control" id="response" name="response"></textarea>
                              </div>
                              <div class="col-12">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" 
                                  @php
                                      if($datas[0]->sumber_Pengaduan == 'Telegram'){
                                        echo 'checked';
                                      }
                                  @endphp
                                  >
                                  <label class="form-check-label" for="invalidCheck">
                                    Menggunakan Telegram
                                  </label>
                                </div>
                              </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Kirim Respon</button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                    {{-- end modal send message --}}
                  </div>
              </div>
            </div>
        </div>
    </section>
</main>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

{{-- js toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  
  @if (Session::has('errorPengajuan'))
    toastr.error("{{ Session::get('errorPengajuan') }}")
  @endif
  @if (Session::has('successPengajuan'))
    toastr.success("{{ Session::get('successPengajuan') }}")
  @endif

  @if (Session::has('successSending'))
    toastr.success("{{ Session::get('successSending') }}")
  @endif
  @if (Session::has('errorSending'))
    toastr.error("{{ Session::get('errorSending') }}")
  @endif

</script>