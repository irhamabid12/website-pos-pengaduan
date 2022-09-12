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
  <link rel="stylesheet" href="{{ asset('assets/css/styleDashboard.css')}}">
  {{-- css toastr --}}
  <link rel="stylesheet" href="{{ asset('assets/css/toastr.css')}}">
</head>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profil Akun</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Profil Akun</li>
        </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <div class="row g-3 profile">
                          <div class="col-md-12">
                            <h6 class="card-title">Data Admin</h6>
                          </div>
                          <div class="col-lg-2 text-center">
                            <img class="rounded-circle mb-4" style="max-height: 120px;" src="{{ asset('assets/img/profile-img.jpg') }}" alt="{{ auth()->user()->username }}">
                          </div>
 
                          <div class="col-lg-10">
                            <div class="row">
                              <div class="col-md-10">
                                <h6 class="sub-card-title fw-bold text-dark fs-6">{{ auth()->user()->name }}</h6>
                              </div>
                              <div class="col-md-2">
                                <button type="button" class="edit-profile btn btn-outline-primary btn-sm"><i class="bi bi-pencil-square"></i> Ubah</button>
                              </div>
                              <div class="col-md-12">
                                <h6 class="sub-card-title">{{ auth()->user()->jabatan }}</h6>
                            </div>
                              <div class="col-md-12">
                                  <h6 class="sub-card-title fw-bold text-dark">{{ auth()->user()->username }}</h6>
                                  <h6 class="sub-card-title">Username</h6>
                              </div>
                              <div class="col-md-12">
                                <h6 class="sub-card-title fw-bold text-dark">{{ auth()->user()->nipPos }}</h6>
                                <h6 class="sub-card-title">Nippos</h6>
                              </div>
                            </div>
                          </div>
                          <hr class="dropdown-divider mb-2">

                          <div class="col-md-12">
                            <h6 class="card-title">Pengaturan Akun</h6>
                          </div>
                          <div class="col-md-2">
                            <h6 class="sub-card-title fw-bold text-dark">{{ auth()->user()->email }}</h6>
                            <h6 class="sub-card-title">Email</h6>
                          </div>
                          <div class="col-md-3">
                            <a href="#changeEmail" data-bs-toggle="modal" class="sub-card-title" style="color: #FF6F00; "><i class="bi bi-pencil-square"></i> Ubah</a>
                          </div>
                          <div class="col-md-4">
                            <a href="#changePassword" data-bs-toggle="modal" class="sub-card-title" style="color: #FF6F00; "><i class="bi bi-pencil-square"></i> Ubah Password</a>
                          </div>
                      </div>
                      {{-- form edit profile --}}
                      <div class="row g-3 form-edit-profile" style="display: none;">
                        <div class="col-md-12">
                          <h6 class="card-title">Data Admin</h6>
                        </div>
                        <div class="col-lg-2 text-center">
                          <img class="rounded-circle mb-2" style="max-height: 120px;" src="{{ asset('assets/img/profile-img.jpg') }}" alt="{{ auth()->user()->username }}">
                          <br>
                          <a href="#changeProfileImg" data-bs-toggle="modal" class="sub-card-title text-center" style="color: #FF6F00; "><i class="bi bi-pencil-square"></i> Ubah</a>
                        </div>
                          {{-- modal changeProfileImg --}}
                          <div class="modal fade" id="changeProfileImg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="../editImgProfile" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                      {{-- <label for="emailLama" class="form-label"></label> --}}
                                      <input type="file" class="form-control" id="imgBaru" name="imgBaru" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                          {{-- end modal changeProfileImg --}}
                        
                        <div class="col-lg-10">
                          <form action="../editProfile" method="post">
                            @csrf
                            <div class="row">
                              <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input class="form-control form-control-sm" id="nama" name="nama" type="text" value="{{ auth()->user()->name }}">
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input class="form-control form-control-sm" id="jabatan" name="jabatan" type="text" value="{{ auth()->user()->jabatan }}">
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control form-control-sm" id="username" name="username" type="text" value="{{ auth()->user()->username }}">
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="nippos" class="form-label">Nippos</label>
                                <input class="form-control form-control-sm" id="nippos" name="nippos" type="text" value="{{ auth()->user()->nipPos }}">
                              </div>
                              <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        
                        <hr class="dropdown-divider mb-2">

                        <div class="col-md-12">
                          <h6 class="card-title">Pengaturan Akun</h6>
                        </div>
                        <div class="col-md-2">
                          <h6 class="sub-card-title fw-bold text-dark">{{ auth()->user()->email }}</h6>
                          <h6 class="sub-card-title">Email</h6>
                        </div>
                        <div class="col-md-3">
                          <a href="#changeEmail" data-bs-toggle="modal" class="sub-card-title" style="color: #FF6F00; "><i class="bi bi-pencil-square"></i> Ubah</a>
                        </div>
                        <div class="col-md-4">
                          <a href="#changePassword" data-bs-toggle="modal" class="sub-card-title" style="color: #FF6F00; "><i class="bi bi-pencil-square"></i> Ubah Password</a>
                        </div>
                    </div>
                      {{-- end form edit profile --}}
                  </div> 
                    {{-- modal email --}}
                    <div class="modal fade" id="changeEmail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="../editEmailProfile" method="post">
                              @csrf
                              <div class="mb-3">
                                <label for="emailLama" class="form-label">Email lama</label>
                                <input type="email" class="form-control" id="emailLama" name="emailLama" value="{{ auth()->user()->email }}">
                              </div>
                              <div class="mb-3">
                                <label for="emailBaru" class="form-label">Email baru</label>
                                <input type="email" class="form-control" id="emailBaru" name="emailBaru">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    {{-- end modal email --}}

                    {{-- modal password --}}
                    <div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="../editPasswordProfile" method="post">
                              @csrf
                              <div class="mb-3">
                                <label for="passwordLama" class="form-label">Email lama</label>
                                <input type="password" class="form-control form-label-sm" id="passwordLama" name="passwordLama">
                              </div>
                              <div class="mb-3">
                                <label for="passwordBaru" class="form-label">password baru</label>
                                <input type="password" class="form-control form-label-sm" id="passwordBaru" name="passwordBaru">
                              </div>
                              <div class="mb-3">
                                <label for="konfirmasiPassword" class="form-label">password baru</label>
                                <input type="password" class="form-control form-label-sm" id="konfirmasiPassword" name="konfirmasiPassword">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    {{-- end modal password --}}
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
  $(document).ready(function () {
    $('.edit-profile').click(function () { 
      $('.form-edit-profile').show();
      $('.profile').hide();
    });
  });
</script>

{{-- <script>
  
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

</script> --}}