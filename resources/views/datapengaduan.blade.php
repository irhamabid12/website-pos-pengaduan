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
      <h1>Data Pengaduan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Data Pengaduan</li>
          <li class="type-filter breadcrumb-item active">Semua</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dataPengaduan">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="d-flex bg-light border-bottom mb-3 mt-3">
                  <div class="col-md-auto">
                        <a href="buatPengaduanBaru" class="btn btn-sm mt-3 fw-bold">
                          <i class="bi bi-pencil-square me-1"></i> Buat Pengaduan
                        </a>
                  </div>
                    
                  <div class="dropdown col-md-2">
                    <div class="input-group input-group-sm mb-3 me-2">
                    <label class="input-group-text mt-3 mb-3 ms-2 fw-bold"><i class="bi bi-card-checklist me-1"></i></label>
                      <select id="filter-pengaduan" class="form-select form-select-sm mt-3 mb-3 me-2 fw-bold dropdown-toggle" id="btn-filter">
                          <option value="Semua" selected>Kategori Pengaduan</option>
                        @foreach ($jenis as $jns)
                          <option value="{{ ucfirst(strtolower($jns->nama_jpengaduan)) }}">{{ ucfirst(strtolower($jns->nama_jpengaduan)) }}</option>
                        @endforeach
                      </select>
                    </div>
                    {{-- <button class="btn btn-sm mt-3 mb-3 ms-0 dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-card-checklist me-1"></i> Kategori Pengaduan
                    </button>
                    <ul class="filter dropdown-menu">
                      @foreach ($jenis as $jns)
                        <li><button class="dropdown-item" type="submit" id="filter" value='{{ ucfirst(strtolower($jns->nama_jpengaduan)) }}'>{{ $jns->nama_jpengaduan }}</button></li>
                      @endforeach

                    </ul> --}}
                  </div>

                  <div class="dropdown col-md-2">
                    <div class="input-group input-group-sm mb-3 me-2">
                    <label class="input-group-text mt-3 mb-3 ms-2 fw-bold"><i class="bi bi-card-checklist me-1"></i></label>
                      <select id="filter-status" class="form-select form-select-sm mt-3 mb-3 me-2 fw-bold dropdown-toggle" id="btn-filter">
                          <option value="Semua" selected>Status</option>
                        @foreach ($status as $st)
                          <option value="{{ ucfirst(strtolower($st->status)) }}">{{ ucfirst(strtolower($st->status)) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="filter-date col-md me-2">
                    <div class="input-group input-group-sm mt-3">
                      <input id="date-start" type="date" placeholder="start" class="date-start form-control form-control-sm">
                      <span class="input-group-text input-group-text-sm">-</span>
                      <input id="date-end" type="date" placeholder="end" class=" form-control form-control-sm">
                    </div>
                  </div>

                  <div class="col-md-auto ms-auto me-2">
                    <input id="search" class="form-control form-control-sm mt-3" placeholder="Search..." type="text">
                  </div>
                  <div class="col-md-auto ms-auto me-2 mt-3">
                    <a href="../datapengaduan/exportPDF" class="btn btn-dark btn-sm"><i class="bi bi-file-earmark-pdf"></i> convert pdf</a>
                  </div>
                </div>                
                  <div id="table" class="dataTable-container dataTable">
                    {{-- <div class="overflow-auto"> --}}
                      <table class="table table-striped table-hover table-sm">
                        <thead class="text-center" style="font-size: ">
                          <tr>
                            <th scope="col" data-sortable="" style="width: 11,11%;">
                                ID 
                            </th>
                            <th scope="col" data-sortable="" style="width: 11,11%;">
                                Ketegori Pengaduan
                            </th>
                            {{-- <th scope="col" data-sortable="" style="width: 11,11%;">
                                Produk
                            </th> --}}
                            <th scope="col" data-sortable="" style="width: 11,11%;">
                                Pengadu
                            </th>
                            <th scope="col" data-sortable="" style="width: 11,11%;">
                                Resi
                            </th>
                            <th scope="col" data-sortable="" style="width: 11,11%;">
                                Topik
                            </th>
                            <th scope="col" data-sortable="" style="width: 11,11%;">
                                Tanggal
                            </th>
                            <th scope="col" data-sortable="" style="width: 11,11%;">
                                Status
                            </th>
                            <th scope="col" data-sortable="" style="width: 12%;">
                                Aksi
                            </th>
                          </tr>
                        </thead>
                          <tbody class="fs-6">
                            @foreach ($data as $item)
                                <tr>
                                  <td class="text-center">{{ $item->id_Pengaduan }}</td>
                                  <td class="text-center align-middle">{{ (ucfirst(strtolower($item->jenis_Pengaduan))) }}</td>
                                  {{-- <td class="text-center align-middle">{{ (ucfirst(strtolower($item->jenis_Kiriman))) }}</td> --}}
                                  <td class="text-center align-middle">{{ (ucfirst(strtolower($item->nama_Pelanggan))) }}</td>
                                  <td class="text-center align-middle">{{ $item->nomor_Resi }}</td>
                                  <td>{{ (ucfirst(strtolower($item->isi_Pengaduan))) }}</td>
                                  <td class="text-center align-middle">{{ $item->created_at }}</td>
                                  <td  class="text-center align-middle">{{ ucfirst(strtolower($item->status)) }}</td>
                                  <td class="text-center align-middle">
                                    <a href="../detailPengaduan/{{ $item->id_Pengaduan }}"><i class="bi bi-three-dots me-1 ms-1"></i></a>
                                    <a href="../editPengaduan/{{ $item->id_Pengaduan }}"><i class="bi bi-pencil me-1 ms-1"></i></a>
                                    <a href="../deletePengaduan/{{ $item->id_Pengaduan }}"><i class="bi bi-trash me-1 ms-1"></i></a>
                                  </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                    {{-- </div> --}}
                      <div id="pagination" class="pagination d-flex justify-content-center mt-3">
                        {{ $data->links() }}
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
{{-- Search ajax --}}
  <script>
    $(document).ready(function() {
      searchData();
      $('#search').keyup(function () {
          var strcari = $('#search').val();
          if(strcari != "") {
              $.ajax({
                type: "get",
                url: "{{ url('search') }}",
                data: "keyword=" +strcari,
                success: function (data) {
                  $('tbody').html(data);
                  $('.pagination').hide();
                }
              });
          } else {
            searchData();
            $('.pagination').show();
          }
      });
    });

    function searchData() {
    $.get("{{ url('read') }}", {},
      function (data, status) {
        $('tbody').html(data);
      });
    }
  </script>
{{-- End Search ajax --}}
<script>
  $(document).ready(function() {
    allData();
    $('#filter-pengaduan').change(function () {
        var filter = $('#filter-pengaduan').val();
        // alert(''+filter);
        if(filter != ""){
          $.ajax({
            type: "get",
            url: "{{ url('filter') }}",
            data: "pengaduan=" +filter,
            success: function (data) {
              $('tbody').html(data);
              $('.type-filter').text(filter);
            }
          });
        }
        else{
          allData();
        }
        }); 
    });
    function allData() {
    $.get("{{ url('semua') }}", {},
      function (data, status) {
        $('tbody').html(data);
      });
    }
</script>

<script>
  $(document).ready(function() {
    // searchData();
    $('#filter-status').change(function () {
        var filter = $('#filter-status').val();
        // alert(''+filter);
          $.ajax({
            type: "get",
            url: "{{ url('filter') }}",
            data: "status=" +filter,
            success: function (data) {
              $('tbody').html(data);
              $('.type-filter').text(filter);
            }
          });
        });
        $('.filter-date [type="date"]').change(function () {
        var dateStart = $('.filter-date #date-start').val();
        var dateEnd = $('.filter-date #date-end').val();
        // alert(''+dateStart+ ' - '+dateEnd);
          $.ajax({
            type: "get",
            url: "{{ url('filter') }}",
            data: "dateStart=" +dateStart+ "dateEnd=" +dateEnd,
            success: function (data) {
              $('tbody').html(data);
              $('.type-filter').text(''+dateStart+ ' - '+dateEnd);
            }
          });
        });  
    });
</script>

<script>
  $(document).ready(function() {
    // searchData();
    $('.filter-date [type=date]').change(function () {
        var date-start = $('.filter-date [type=date]').val();
        // alert(''+filter);
          $.ajax({
            type: "get",
            url: "{{ url('filter') }}",
            data: "filter=" +date-start,
            success: function (data) {
              $('tbody').html(data);
              $('.type-filter').text(date-start);
            }
          });
        }); 
    });

  function searchData() {
  $.get("{{ url('read') }}", {},
    function (data, status) {
      $('tbody').html(data);
    });
  }
</script>

<script>
  
</script>
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
    @if (Session::has('errorDelete'))
      toastr.error("{{ Session::get('errorDelete') }}")
    @endif
    @if (Session::has('successUpdate'))
    toastr.success("{{ Session::get('successUpdate') }}")
    @endif
    @if (Session::has('errorUpdate'))
      toastr.error("{{ Session::get('errorUpdate') }}")
    @endif
  </script>
  
  