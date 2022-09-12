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
        <h1>Pengaturan Bot Telegram</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pengaturan Bot Telegram</li>
          </ol>
        </nav>
    </div>
      <!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                {{-- <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns"> --}}
                    {{-- message response --}}
                <div class="row">
                    <div class="col-auto me-auto">
                        <h5 class="card-title text-dark mt-3">Pengaturan Pesan Respon</h5>
                        <h6 class="sub-card-title mb-3">Untuk mengatur pesan respon Bot Telegram</h6>
                    </div>
                </div>
                  <div class="dataTable-container overflow-auto">
                    <table class="table table-striped table-sm table-hover">
                        <thead class="text-center">
                            <tr>
                                <th scope="col" data-sortable="" style="width: 10%;">
                                    Pesan
                                </th>
                                <th scope="col" data-sortable="" style="width: 60%;">
                                    Respon
                                </th>
                                <th scope="col" data-sortable="" style="width: 20%;">
                                    Keterangan
                                </th>
                                <th scope="col" data-sortable="" style="width: 20%;">
                                    Pengaturan
                                </th>
                            </tr>
                        </thead>
                        <tbody class="fs-6">
                            @foreach ($messages as $msg)
                            <tr>
                                <td class="text-center align-middle">{{ $msg->message}}</td>
                                <td>{{ $msg->response}}</td>
                                <td class="text-center align-middle">{{ $msg->keterangan }}</td>
                                <td class="text-center align-middle">
                                    <a data-bs-toggle="collapse" href="#collapseExample{{ $msg->id }}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="bi bi-pencil-square me-3"></i></a>
                                    <a href="deleteResponse/{{ $msg->id }}"><i class="bi bi-archive-fill"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>

                  @foreach ($messages as $msg)
                  
                  <form action="">
                    <div class="collapse mt-3" id="collapseExample{{ $msg->id }}">
                        <div class="card card-body">
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <input type="text" class="form-control" id="message" value={{ $msg->message }}>
                            </div>
                            <div class="mb-3">
                                <label for="response" class="form-label">Respon</label>
                                <textarea class="form-control" id="response" cols="3">{{ $msg->response }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="3">{{ $msg->keterangan }}</textarea>
                            </div>
                            <div class="button">
                                <a class="btn btn-primary btn-sm" href="deleteResponse/{{ $msg->id }}"><i class="bi bi-pencil-square me-3"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                  </form>
                  @endforeach

                {{-- </div> --}}
                <div class="d-flex justify-content-center mt-3">
                    {{ $messages->links() }}
                </div>
                    {{--end message response --}}

                    {{-- user bot --}}
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                    <h5 class="card-title text-dark mt-3">User Bot Telegram</h5>
                    <h6 class="sub-card-title mb-3">Daftar pelanggan yang pernah melakukan pengaduan dengan Telegram</h6>
                    <div class="dataTable-container overflow-auto">
                      <table class="table table-striped table-sm table-hover">
                          <thead>
                              <tr>
                                  <th scope="col" data-sortable="" style="width: 16,66667%;">
                                      Id Users
                                  </th>
                                  <th scope="col" data-sortable="" style="width: 16,66667%;">
                                      Username
                                  </th>
                                  <th scope="col" data-sortable="" style="width: 16,66667%;">
                                      Nickname
                                  </th>
                                  <th scope="col" data-sortable="" style="width: 16,66667%;">
                                      Tanggal Masuk
                                  </th>
                                  <th scope="col" data-sortable="" style="width: 16,66667%;">
                                      Tanggal Update
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="fs-6">
                              @foreach ($users as $user)
                              <tr>
                                  <td>{{ $user->id}}</td>
                                  <td>{{ $user->username }}</td>
                                  <td>{{ $user->nickname }}</td>
                                  <td>{{ $user->created_at }}</td>
                                  <td>{{ $user->updated_at}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                    </div>
  
                  </div>
                  <div class="d-flex justify-content-center mt-3">
                      {{ $users->links() }}
                  </div>
              </div>
                    {{-- end user bot  --}}

            </div>
          </div>
        </div>
    </section>
</main>
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