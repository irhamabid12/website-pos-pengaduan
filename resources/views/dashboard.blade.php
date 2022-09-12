@extends('layout.header')
{{-- @extends('layout.sidemenu') --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <link href="{{ asset('assets/vendor/calendar/vanillaCalendar.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/styleDashboard.css')}}">
  {{-- tamplate calendar --}}
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('calendar/css/style.css') }}">
 

</head>

<body>
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
    
          <li class="nav-item">
            <a class="nav-link " href="/dashboard">
              <i class="bi bi-grid"></i>
              <span>Pusat Monitoring</span>
            </a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="/datapengaduan">
              <i class="bi bi-table"></i>
              <span>Data Pengaduan</span>
            </a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="data_ganti_rugi">
              <i class="bi bi-currency-exchange"></i>
              <span>Data Ganti Rugi</span>
            </a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="/bantuan">
              <i class="bi bi-question-circle"></i>
              <span>Bantuan</span>
            </a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="/pengaturanBotTelegram">
              <i class="bi bi-sliders"></i>
              <span>Pengaturan Bot Telegram</span>
            </a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="daftar_akun">
              <i class="bi bi-card-list"></i>
              <span>Registrasi</span>
            </a>
          </li>
        </ul>
    
      </aside>
    <!-- End Sidebar-->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pusat Monitoring</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Pusat Monitoring</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                  <!-- pusat monitoring Card -->
                  <div class="col-md-16">
                      <div class="card info-card">
                          <div class="card-body">
                              <h5 class="card-title">Pusat Monitoring</h5>
                              <h6 class="sub-card-title">Hal-hal yang perlu dipantau</h6>
                              <div class="container mt-2">
                                  <div class="me-0 row g-4 text-center">
                                  <div class="col-3">
                                      <div class="mt-3 mb-2 jumlah">{{ $pengaduanMasuk }}</div>
                                      <span>Pengaduan Masuk</span>
                                  </div>
                                  <div class="col-3">
                                      <div class="mt-3 mb-2 jumlah">{{ $pengaduanKeterlambatan }}</div>
                                      <span>Pengaduan Keterlambatan</span>
                                  </div>
                                  <div class="col-3">
                                      <div class="mt-3 mb-2 jumlah">{{ $pengaduanKerusakan }}</div>
                                      <span>Pengaduan Kerusakan</span>
                                  </div>
                                  <div class="col-3">
                                      <div class="mt-3 mb-2 jumlah">{{ $pengaduanKehilangan }}</div>
                                      <span>Pengaduan Kehilangan</span>
                                  </div>
                                  </div>

                                  <div class="me-0 row g-4 text-center">
                                      <div class="col-3">
                                          <div class="mt-3 mb-2 jumlah">{{ $pengajuanGantiRugi }}</div>
                                          <span>Pengajuan Ganti Rugi</span>
                                      </div>
                                      <div class="col-3">
                                          <div class="mt-3 mb-2 jumlah">{{ $pengaduanDiproses }}</div>
                                          <span>Pengaduan Diproses</span>
                                      </div>
                                      <div class="col-3">
                                          <div class="mt-3 mb-2 jumlah">{{ $pengaduanSelesai }}</div>
                                          <span>Pengaduan Selesai Diproses</span>
                                      </div>
                                      <div class="col-3">
                                          <div class="mt-3 mb-2 jumlah">{{ $pengajuanGantiRugiSelesai }}</div>
                                          <span>Pengaduan Belum Selesai</span>
                                      </div>
                                      <div class="col-3">
                                          <div class="mt-3 mb-2 jumlah">{{ $pengaduanLain }}</div>
                                          <span>Lain-lain</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End pusat monitoring Card -->
                </div>
            </div>
            <!-- End Left side columns -->
            <!-- Right side columns -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kalender</h5>
                        <div class="container p-0">
                            <div id="v-cal">
                                <div class="vcal-header">
                                    <button class="vcal-btn" data-calendar-toggle="previous">
                                        <svg height="20" version="1.1" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                                        </svg>
                                    </button>
                                    <div class="vcal-header__label" data-calendar-label="month">
                                        March 2017
                                    </div>
                                    <button class="vcal-btn" data-calendar-toggle="next">
                                        <svg height="20" version="1.1" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="vcal-week">
                                    <span>Mon</span>
                                    <span>Tue</span>
                                    <span>Wed</span>
                                    <span>Thu</span>
                                    <span>Fri</span>
                                    <span>Sat</span>
                                    <span>Sun</span>
                                </div>
                                <div class="vcal-body" data-calendar-area="month"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Right side columns -->
            <div class="col-lg-12">
              <div class="row">
                <div class="col-6">
                  <div class="card" style="height: 320px;">
                      <div class="card-body">
                          <div class="row">
                              <div class="col">
                                  <h5 class="card-title">Total Kunjungan Pengaduan</h5>
                                  <h6 class="sub-card-title">Grafik kunjungan pengaduan </h6>
                              </div>
                              <div class="col-md-auto mt-3">
                                  <select class="form-select form-select-sm" aria-label="Default select example">
                                    @php
                                    for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                    echo "<option value='$i'>$i</option>";
                                    }
                                    @endphp
                                  </select>
                              </div>
                          </div>
                          <!-- Line Chart -->
                          <canvas id="barChart" style="max-height: 420px;"></canvas>
                          <script>
                              document.addEventListener("DOMContentLoaded", () => {
                              new Chart(document.querySelector('#barChart'), {
                                  type: 'bar',
                                  data: {
                                  labels: ['January', 'February', 'March', 'April', 'May', 'June', 
                                          'July', 'August', 'September','October', 'November', 'Desember'],
                                  datasets: [{
                                      label: 'Bar Chart',
                                      data: 
                                      [
                                        {{ $januari }},
                                        {{ $februari }},
                                        {{$maret}},
                                        {{ $april }},
                                        {{ $mei }},
                                        {{ $juni }},
                                        {{ $juli }},
                                        {{ $agustus }},
                                        {{ $september }},
                                        {{ $oktober }},
                                        {{ $november }},
                                        {{ $desember }}
                                      ],
                                      backgroundColor: [
                                      '#FF6F00']
                                  }]
                                  },
                                  options: {
                                  scales: {
                                      y: {
                                      beginAtZero: true
                                      }
                                  }
                                  }
                              });
                              });
                          </script>
                          <!-- End Line Chart -->
                      </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengaduan Per Produk</h5>
                        <h6 class="sub-card-title">Grafik pengaduan berdasarkan kategori</h6>
                        <!-- Donut Chart -->
                        <div id="donutChart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#donutChart"), {
                                series: 
                                [
                                  {{ $countProduct1 }},
                                  {{ $countProduct2 }},
                                  {{ $countProduct3 }},
                                  {{ $countProduct4 }},
                                  {{ $countProduct5 }},
                                  {{ $countProduct6 }},
                                  {{ $countProduct7 }},
                                  {{ $countProduct8 }},
                                  {{ $countProduct8 }},
                                  {{ $countProduct10 }},
                                  
                                ],
                                chart: {
                                height: 350,
                                type: 'donut',
                                toolbar: {
                                    show: true
                                }
                                },
                                labels: 
                                [
                                  'Cash on Delivery', 
                                  'Paket Jumbo',
                                  'PP Biasa DN', 
                                  'Paket Kilat Khusus',
                                  'Surat Kilat Khusus',
                                  'Remittance Services',
                                  'Pos Express',
                                  'Korporat Prioritas',
                                  'Express Mail Services',
                                  'Lain-lain'
                                ],
                            }).render();
                            });
                        </script>
                        <!-- End Donut Chart -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <!-- peforma -->
              <div class="col-12">
                  <div class="card">
                                      
                    <div class="filter">  
                        <button class="btn btn-outline-dark btn-sm me-4" type="button" data-bs-toggle="collapse" data-bs-target=".collapseColumnChart" aria-expanded="false" aria-controls="collapseColumnChart">
                          <i class="bi bi-bar-chart-line-fill"></i> Grafik
                        </button> 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Peforma</h5>
                        <h6 class="sub-card-title">Tabel performa kinerja customer service</h6>
                          <div class="collapse collapseColumnChart">
                            <div class="col-1 mt-3">
                              <select class="form-select form-select-sm" aria-label="Default select example">
                                @php
                                for($i=date('Y')-1; $i>=date('Y')-32; $i-=1){
                                echo "<option value='$i'>$i</option>";
                                }
                                @endphp
                              </select>
                          </div>
                            <div id="columnChart">
                              <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                  new ApexCharts(document.querySelector("#columnChart"), {
                                    series: [{
                                      name: 'Pengaduan ditangani',
                                      data: 
                                      [
                                        {{ $tingkatDitangani1 }},
                                        {{ $tingkatDitangani2 }},
                                        {{ $tingkatDitangani3 }},
                                        {{ $tingkatDitangani4 }},
                                        {{ $tingkatDitangani5 }},
                                        {{ $tingkatDitangani6 }},
                                        {{ $tingkatDitangani7 }},
                                        {{ $tingkatDitangani8 }},
                                        {{ $tingkatDitangani9 }},
                                        {{ $tingkatDitangani10 }},
                                        {{ $tingkatDitangani11 }},
                                        {{ $tingkatDitangani12 }}  
                                      ]
                                    }, {
                                      name: 'Pengaduan selesai',
                                      data: [
                                        {{ $tingkatSelesai1 }},
                                        {{ $tingkatSelesai2 }},
                                        {{ $tingkatSelesai3 }},
                                        {{ $tingkatSelesai4 }},
                                        {{ $tingkatSelesai5 }},
                                        {{ $tingkatSelesai6 }},
                                        {{ $tingkatSelesai7 }},
                                        {{ $tingkatSelesai8 }},
                                        {{ $tingkatSelesai9 }},
                                        {{ $tingkatSelesai10 }},
                                        {{ $tingkatSelesai11 }},
                                        {{ $tingkatSelesai12 }} 
                                      ]
                                    }, {
                                      name: 'Kepuasan pelanggan',
                                      data: [
                                        {{ $tingkatPuas1 }},
                                        {{ $tingkatPuas2 }},
                                        {{ $tingkatPuas3 }},
                                        {{ $tingkatPuas4 }},
                                        {{ $tingkatPuas5 }},
                                        {{ $tingkatPuas6 }},
                                        {{ $tingkatPuas7 }},
                                        {{ $tingkatPuas8 }},
                                        {{ $tingkatPuas9 }},
                                        {{ $tingkatPuas10 }},
                                        {{ $tingkatPuas11 }},
                                        {{ $tingkatPuas12 }} 
                                      ]
                                    }],
                                    chart: {
                                      type: 'bar',
                                      height: 350
                                    },
                                    plotOptions: {
                                      bar: {
                                        horizontal: false,
                                        columnWidth: '55%',
                                        endingShape: 'rounded'
                                      },
                                    },
                                    dataLabels: {
                                      enabled: false
                                    },
                                    stroke: {
                                      show: true,
                                      width: 2,
                                      colors: ['transparent']
                                    },
                                    xaxis: {
                                      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
                                    },
                                    yaxis: {
                                      title: {
                                        text: '% (Persen)'
                                      }
                                    },
                                    fill: {
                                      opacity: 1
                                    },
                                    tooltip: {
                                      y: {
                                        formatter: function(val) {
                                          return  val + " %"
                                        }
                                      }
                                    }
                                  }).render();
                                });
                              </script>
                            </div>
                          </div>
                        <table id="tabel" class="table table-bordered table-striped">
                            <thead>
                                <tr style="font-size: 13px">
                                    <th scope="col">Aspek</th> 
                                    <th scope="col" class="text-center">Target</th>
                                    <th scope="col" class="text-center">Jumlah Total</th>
                                    <th scope="col" class="text-center">Capaian</th>
                                    <th scope="col" class="text-center">Persen Capaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">Tingkat Pengaduan ditangani</td>
                                    <td scope="col" class="text-center">>70%</td>
                                    <td scope="col" class="text-center">{{ $seluruhPengaduan }}</td>
                                    <td scope="col" class="text-center">{{ $pengaduanDitangani }}</td>
                                    <td scope="col" class="text-center">{{ $tingkatDitangani }}%</td>
                                </tr>
                                <tr>
                                    <td scope="col">Tingkat Pengaduan selesai</td>
                                    <td scope="col" class="text-center">>70%</td>
                                    <td scope="col" class="text-center">{{ $seluruhPengaduan }}</td>
                                    <td scope="col" class="text-center">{{ $pengaduanSelesai }}</td>
                                    <td scope="col" class="text-center">{{ $tingkatSelesai }}%</td>
                                </tr>
                                <tr>
                                    <td scope="col">Tingkat Kepuasan pelanggan</td>
                                    <td scope="col" class="text-center">>70%</td>
                                    <td scope="col" class="text-center">{{ $jumlahKepuasan }}</td>
                                    <td scope="col" class="text-center">{{ $jumlahPuas }}</td>
                                    <td scope="col" class="text-center">{{ $tingkatPuas }}%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- end peforma --}}
            </div>
          </div>
        </div>
    </section> 
</main>
    <!-- End #main -->
    <script>
        window.addEventListener('load', function () {
            vanillaCalendar.init({
                disablePastDays: true
            });
        });
    </script>
  <script src="{{ asset('assets/vendor/calendar/vanillaCalendar.js') }}" type="text/javascript"></script>
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
</body>
</html>
<script src="{{ asset('assets/js/main.js') }}"></script>
