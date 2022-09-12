@extends('layout.header')
@extends('layout.sidemenu')

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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  {{-- toastr css --}}
  <link rel="stylesheet" href="{{ asset('assets/css/toastr.css')}}">

</head>

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Pengaduan Ganti Rugi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Data Pengaduan Ganti Rugi</li>
          <li class="breadcrumb-item active">Semua</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="d-flex bg-light border-bottom mb-3 mt-3">
                  <div class="col-md-auto">
                        <a href="buatPengajuanGantiRugi" class="btn btn-sm mt-3 fw-bold">
                          <i class="bi bi-pencil-square me-1"></i> Buat Pengaduan
                        </a>
                  </div>
                    
                  <div class="dropdown col-md-auto">
                    <button class="btn btn-sm mt-3 mb-3 ms-0 dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-card-checklist me-1"></i> Kategori Pengaduan
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      @foreach ($jenis as $jns)
                        <li><a class="dropdown-item" href="datapengaduan/{{ $jns->nama_jpengaduan }}">{{ $jns->nama_jpengaduan }}</a></li>
                      @endforeach

                    </ul>
                  </div>

                  <div class="dropdown">
                    <button class="btn btn-sm mt-3 mb-3 ms-0 dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-boxes me-1"></i>  Kategori Produk
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      @foreach ($produk as $prod)
                        <li><a class="dropdown-item" href="datapengaduan/{{ $prod->nama_produk }}">{{ $prod->nama_produk }}</a></li>
                      @endforeach

                    </ul>
                  </div>

                  <div class="col-md me-2">
                    <div class="input-group input-group-sm mt-3">
                      <input type="date" placeholder="start" class="form-control form-control-sm">
                      <span class="input-group-text input-group-text-sm">-</span>
                      <input type="date" placeholder="end" class="form-control form-control-sm">
                    </div>
                  </div>

                  <div class="col-md-auto ms-auto me-2">
                    <input id="search" class="form-control form-control-sm mt-3" placeholder="Search..." type="text">
                  </div>
                  <div class="col-md-auto ms-auto me-2 mt-3">
                    <a href="../data_ganti_rugi/exportPDF" class="btn btn-dark btn-sm"><i class="bi bi-file-earmark-pdf"></i> convert pdf</a>
                  </div>
              </div>

              <table class="table datatable dataTable-table">
                <thead  class="text-center">
                  <tr  class="text-center">
                    <th scope="col"class="text-center" >
                      <a href="#" class="text-center">ID</a>
                    </th>
                    <th scope="col"class="text-center"">Nomor Resi</th>
                    <th scope="col"class="text-center"">Nama Pengadu</th> 
                    <th scope="col"class="text-center" style="width: 20%;">Jumlah Ganti Rugi</th>
                    <th scope="col"class="text-center"">Tanggal Entri</th>
                    <th scope="col"class="text-center"">Status</th>
                    <th scope="col"class="text-center"">Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                      <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td class="text-center">{{ $item->nomor_resi }}</td>
                        <td class="text-center">{{ $item->nama_pengirim}}</td>
                        <td class="text-center">{{ "Rp " . number_format($item->jumlah_ganti_rugi, 2, ",", ".") }}</td>
                        <td class="text-center">{{ $item->created_at }}</td>
                        <td class="text-center">{{ $item->status }}</td>
                        <td class="text-center">
                          <a href="../data_ganti_rugi/detail/{{ $item->id }}"><i class="bi bi-file-earmark-pdf me-1 ms-1"></i></a>
                          <a href="../data_ganti_rugi/edit/{{ $item->id }}"><i class="bi bi-pencil me-1 ms-1"></i></a>
                          <a href="../data_ganti_rugi/delete/{{ $item->id }}"><i class="bi bi-trash me-1 ms-1"></i></a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table> 
            </div>
            <div id="pagination" class="d-flex justify-content-center mt-3">
              {{ $data->links() }}
            </div>
              {{-- <div class="dataTable-dropdown">
                <label>
                    <select class="dataTable-selector">
                      <option value="5">5</option>
                      <option value="10" selected>10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="25">25</option>
                    </select> 
                    muat per halaman
                </label>
              </div> --}}
          </div>
        </div>
      </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

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

   {{-- jquery --}}
   <script src="{{ asset('assets/js/jquery.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

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
    
    @if (Session::has('successDelete'))
      toastr.success("{{ Session::get('successDelete') }}")
    @endif 

    @if (Session::has('errorDelete'))
      toastr.error("{{ Session::get('errorDelete') }}")
    @endif 
  </script>
  </body>
</html>