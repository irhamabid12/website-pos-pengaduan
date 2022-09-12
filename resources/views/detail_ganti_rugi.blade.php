<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
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
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
  
  {{-- jquery --}}
  <script src="{{ asset('assets/js/jquery.js') }}"></script>

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  {{-- css toastr --}}
  <link rel="stylesheet" href="{{ asset('assets/css/toastr.css')}}">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script> --}}
  
  <style>
    .form-section{
      display: none;
    }
    .form-section.current{
      display: inherit;
    }
  </style>

</head>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="brand d-flex align-items-center justify-content-between">
    <a href="/dashboard" class="logo d-flex align-items-center">
      <img class="brand-logo" src="{{ asset('assets/img/logo.png') }}">
      <span class="brand-title">Pos Indonesia</span>
    </a>
  </div>
  <!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center"> 
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->username }}</span>
        </a>
        <!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ auth()->user()->username }}</h6>
            <span>posisi staff</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-gear"></i>
              <span>Account Settings</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
              <i class="bi bi-question-circle"></i>
              <span>Need Help?</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="login">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul>
        <!-- End Profile Dropdown Items -->
      </li>
      <!-- End Profile Nav -->

    </ul>
  </nav>
  <!-- End Icons Navigation -->

</header>
<!-- End Header -->
<main id="main" class="main">
  <!-- Page Title -->
  <div class="pagetitle">
      <h1>Detail Pengajuan Ganti Rugi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="datapengaduan">Data Ganti Rugi</a></li>
          <li class="breadcrumb-item">Detail Pengajuan Ganti Rugi</li>
        </ol>
      </nav>
  </div>

  <section>
    <div class="row">
        <div class="card px-5">
          <div class="card-header" style="background-color: white;">
            <div class="row">
              <div class="col-auto me-auto mt-5 ms-5">
                <img src="{{ asset('assets/img/logo-black.png') }}" alt="" style="width:120px;">
              </div>
              <div class="col-auto me-5 mt-5">
                <h4 class="h4 fw-bold " id="stepForm" style="color: black;">Form JGR-1</h4>
                <p style="color: black;">Jaminan Ganti Rugi Kiriman Domestik</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 px-5 py-5">
            <div class="form-section">
              <div class="d-flex justify-content-center mt-2">
                <h5 class="h5 fw-bold " style="color: black;">FORMULIR PENGADUAN</h5>
              </div>
              <br><br>
              <table class="table table-striped table-bordered">
                <tbody>
                  <tr>
                    <th scope="row" style="width: 20%">Kantor Pos</th>
                    <td scope="row">{{ $data[0]->kantor_pos }}</td>
                  <tr>
                    <th scope="row" style="width: 20%">Tanggal</th>
                    <td scope="row">{{ $data[0]->tanggal_surat }}</td>
                  </tr>
                  <tr>
                    <th scope="row" style="width: 20%">Nomor</th>
                    <td scope="row">{{ $data[0]->nomor_surat }}</td>
                  </tr>
                </tbody>
              </table>
    
              <div class="col-12">
                <label class=" ">Yang bertanda tangan dibawah ini, saya:</label>
              </div>
              
              <table class="table table-striped table-bordered">
                <tbody>
                  <tr>
                    <th scope="row" style="width: 20%">Nama</th>
                    <td scope="row">{{ $data[0]->nama_pelanggan }}</td>
                  <tr>
                    <th scope="row" style="width: 20%">Alamat</th>
                    <td scope="row">{{ $data[0]->alamat_pelanggan }}</td>
                  </tr>
                  <tr>
                    <th scope="row" style="width: 20%">Nomor HP</th>
                    <td scope="row">{{ $data[0]->nomor_hp_pelanggan }}</td>
                  </tr>
                </tbody>
              </table>
              @php
                  $nomorSurat = $data[0]->nomor_surat;
                  $arr_nomorSurat = explode ("/",$nomorSurat);
              @endphp
                <div class="col-12 mb-3">
                  <label class=" ">Menyatakan bahwa kiriman yang saya kirim/seharusnya saya terima berupa {{ $arr_nomorSurat[1] }} dengan data sebagai berikut:</label>
                </div>
              <table class="table table-striped table-bordered">
                <tbody>
                  <tr>
                    <th scope="row" style="width: 25%">Nomor Resi</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->nomor_resi }}</td>
                    <th scope="row" style="width: 25%">Berat (Kg)/ukuran</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->berat_barang }}</td>
                  <tr>
                    <th scope="row" style="width: 25%">Nomor Barcode</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->nomor_resi }}</td>
                    <th scope="row" style="width: 25%">Bea Kirim</th>
                    <td scope="row" style="width: 25%">{{ "Rp " . number_format($data[0]->biaya_kirim, 2, ",", ".") }}</td>
                  </tr>
                  <tr>
                    <th scope="row" style="width: 25%">Tanggal Kirim</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->tanggal_kirim }}</td>
                    <th scope="row" style="width: 25%">Nilai Barang</th>
                    <td scope="row" style="width: 25%">{{ "Rp " . number_format($data[0]->nilai_barang, 2, ",", ".") }}</td>
                  </tr>
                  <tr>
                    <th scope="row" style="width: 25%">Kantor Pos Kirim</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->kantor_asal_kiriman }}</td>
                    <th scope="row" style="width: 25%">Bea Jaminan Ganti Rugi</th>
                    <td scope="row" style="width: 25%">{{ "Rp " . number_format($data[0]->nilai_ganti_rugi, 2, ",", ".") }}</td>
                  </tr>
                </tbody>
              </table>
              <br>
              <table class="table table-striped table-bordered">
                <tbody>
                  <tr>
                    <th scope="row" colspan="2">Pengirim</th>
                    <th scope="row" colspan="2">Penerima</th>
                  </tr>
                  <tr>
                    <th scope="row" style="width: 25%">Nama</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->nama_pengirim }}</td>
                    <th scope="row" style="width: 25%">Nama</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->nama_penerima }}</td>
                  </tr><tr>
                    <th scope="row" style="width: 25%">Alamat</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->alamat_pengirim }}</td>
                    <th scope="row" style="width: 25%">Alamat</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->alamat_penerima }}</td>
                  </tr>
                  <tr>
                    <th scope="row" style="width: 25%">Kode Pos</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->kode_pos_pengirim }}</td>
                    <th scope="row" style="width: 25%">Kode Pos</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->kode_pos_penerima }}</td>
                  </tr>
                  <tr>
                    <th scope="row" style="width: 25%">No HP</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->nomor_hp_pengirim }}</td>
                    <th scope="row" style="width: 25%">No HP</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->nomor_hp_penerima }}</td>
                  </tr>
                  <tr>
                    <th scope="row" style="width: 25%">Email</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->email_pengirim }}</td>
                    <th scope="row" style="width: 25%">Email</th>
                    <td scope="row" style="width: 25%">{{ $data[0]->email_penerima }}</td>
                  </tr>
                </tbody>
              </table>
              <div class="col-12">
                <label class="fw-bold text-dark me-3"><u>Keterangan Kiriman :</u></label>
              </div>
              <div class="row mt-3 ms-2">
                <div class="col-3">
                  <input class="form-check-input" type="radio" name="isiBarang" id="isiBarang1" value="Barang pribadi"
                  @if ($data[0]->keterangan_isi_kiriman == 'Barang Pribadi'):
                      {{ 'checked' }}
                  @endif
                  disabled>
                  <label class="form-check-label" for="isiBarang1">
                    Barang pribadi
                  </label>
                </div>
                <div class="col-3">
                  <input class="form-check-input" type="radio" name="isiBarang" id="isiBarang2" value="Contoh"
                  @if ($data[0]->keterangan_isi_kiriman == 'Contoh'):
                      {{ 'checked' }}
                  @endif
                  disabled>
                  <label class="form-check-label" for="isiBarang2">
                    Contoh
                  </label>
                </div>
                <div class="col-3">
                  <input class="form-check-input" type="radio" name="isiBarang" id="isiBarang3" value="Dokumen"
                  @if ($data[0]->keterangan_isi_kiriman == 'Dokumen'):
                      {{ 'checked' }}
                  @endif
                  disabled>
                  <label class="form-check-label" for="isiBarang3">
                    Dokumen
                  </label>
                </div>
                <div class="col-3">
                  <input class="form-check-input" type="radio" name="isiBarang" id="isiBarang4" value="Barang Dagang"
                  @if ($data[0]->keterangan_isi_kiriman == 'Barang Dagang'):
                      {{ 'checked' }}
                  @endif
                  disabled>
                  <label class="form-check-label" for="isiBarang4">
                    Barang Dagang
                  </label>
                </div>
              </div>
              <br><br>
              <table class="table table-striped table-bordered">
                <thead class="text-center">
                  <tr>
                    <th>Jumlah</th>
                    <th>Isi Kiriman</th>
                    <th>Berat</th>
                    <th>Bahan</th>
                    <th>Negara Pembuat</th>
                    <th>Nilai (Rp.)</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  @foreach ($data as $item)
                    <tr>
                      <td>{{ $item->jumlah }}</td>
                      <td>{{ $item->isi_kiriman }}</td>
                      <td>{{ $item->berat }}</td>
                      <td>{{ $item->bahan }}</td>
                      <td>{{ $item->negara_pembuat }}</td>
                      <td>{{ "Rp " . number_format($item->nilai_isi_kiriman, 2, ",", ".") }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <br>
              <div class="col-12">
                <label class="fw-bold text-dark me-3"><u>Jenis Pengaduan :</u></label>
              </div>
              <div class="row mt-3">
                <div class="col-4">
                  <input class="form-check-input" type="checkbox" value="" 
                    @if ($data[0]->jenis_kerugian == 'Kehilangan'):
                        {{ 'checked' }}
                    @endif  
                  disabled>
                  <label class="form-check-label" for="">
                    Kiriman belum diterima
                  </label>
                </div>
                <div class="col-4">
                  <input class="form-check-input" type="checkbox" value="" 
                  @if ($data[0]->jenis_kerugian == 'Kerusakan'):
                      {{ 'checked' }}
                  @endif    
                  disabled>
                  <label class="form-check-label" for="">
                    Isi kiriman rusak
                  </label>
                </div>
                <div class="col-4">
                  <input class="form-check-input" type="checkbox" value="" 
                  @if ($data[0]->jenis_kerugian == 'Keterlambatan'):
                      {{ 'checked' }}
                  @endif  
                  disabled>
                  <label class="form-check-label" for="">
                    Keterlambatan
                  </label>
                </div>
              </div>
              
              <br><br><br>
    
              <div class="row">
                <div class="col-lg-6 text-center">
                  <div class="col-12">
                    <label for="">Customer Service</label>
                    <br><br><br><br><br><br>
                    <div class="col-12">
                      <label class="fw-bold text-dark"><u>{{ ucfirst(auth()->user()->name) }}</u></label>
                    </div>
                    <div class="col-12">
                      <label class="fw-bold text-dark">NIPPOS. {{ auth()->user()->nipPos }}</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 text-center">
                  <div class="col-12">
                    <label for="">Pelanggan</label>
                    <br><br><br><br><br><br>
                  </div>
                  <div class="col-12">
                    <label class="fw-bold text-dark"><u>{{ ucfirst($data[0]->nama_pelanggan) }}</u></label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-section">
              <div class="d-flex justify-content-center mt-2">
                <h5 class="h5 fw-bold " style="color: black;">PENGAJUAN TUNTUTAN GANTI RUGI</h5>
              </div>
              <br><br>
              <div class="row">
                <div class="col-9">
                </div>
                <div class="col-3">
                    <h5 class="h5" style="color: black;">Surabaya, {{ date('D m Y') }}</h5>
                    <h5 class="h5" style="color: black;">Kepada</h5>
                    <h5 class="h5" style="color: black;">Kepala Kantor Pos</h5>
                    <h5 class="h5" style="color: black;">Surabaya 60000</h5>
                </div>
                <br><br><br>
                <h5 class="h5" style="color: black;">Yang bertanda tangan dibawah ini, saya:</h5>
                <br>
                <table class="table table-striped">
                  <tr>
                    <td scope="row" style="width: 20%;">Nama</td>
                    <td scope="row">{{ $data[0]->nama_pelanggan }}</td>
                  </tr>
                  <tr>
                    <td scope="row" style="width: 20%;">Alamat</td>
                    <td scope="row">{{ $data[0]->alamat_pelanggan }}</td>
                  </tr>
                  <tr>
                    <td scope="row" style="width: 20%;">Nomor HP</td>
                    <td scope="row">{{ $data[0]->nomor_hp_pelanggan }}</td>
                  </tr>
                  {{-- <tr>
                    <td scope="row" style="width: 20%;">Nomor KTP/SIM/Paspor</td>
                    <td scope="row">Mark</td>
                  </tr> --}}
                </table>
                <br>
                <h5 class="h5" style="color: black;">Menyatakan bahwa kami adalah pengirim dari kiriman sebagaimana tersebut dalam formulir nomor: {{ $data[0]->nomor_surat }} dengan ini mengajukan tuntutan ganti rugi atas {{ $data[0]->jenis_kerugian }} sebesar {{"Rp " . number_format( $data[0]->nilai_ganti_rugi, 2, ",", ".") }} </h5>
                <br><br>
                <h5 class="h5" style="color: black;">Atas perhatiannya dan kerjasama diucapkan terimakasih.</h5>
                
                <div class="row mt-5">
                  <div class="col-lg-6 text-center">
                    <div class="col-12">
                      <label for="">Customer Service</label>
                      <br><br><br><br><br><br>
                      <div class="col-12">
                        <label class="fw-bold text-dark"><u>{{ ucfirst(auth()->user()->name) }}</u></label>
                      </div>
                      <div class="col-12">
                        <label class="fw-bold text-dark">NIPPOS. {{ auth()->user()->nipPos }}</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 text-center">
                    <div class="col-12">
                      <label for="">Pelanggan</label>
                      <br><br><br><br><br><br>
                    </div>
                    <div class="col-12">
                      <label class="fw-bold text-dark"><u>{{ ucfirst($data[0]->nama_pelanggan) }}</u></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-section">
              <div class="d-flex justify-content-center mt-2">
                <h5 class="h5 fw-bold " style="color: black;">PENGAJUAN TUNTUTAN GANTI RUGI</h5>
              </div>
              <br><br>
              <div class="row">
                <div class="col-9">
                </div>
                <div class="col-3">
                    <h5 class="h5" style="color: black;">Surabaya, {{ date('D m Y') }}</h5>
                    <h5 class="h5" style="color: black;">Kepada</h5>
                    <h5 class="h5" style="color: black;">Kepala Kantor Pos</h5>
                    <h5 class="h5" style="color: black;">Surabaya 60000</h5>
                </div>
                
                <h5 class="h5 mt-5" style="color: black;">Merujuk Pengajuan Tuntutan Ganti Rugi atas pengaduan nomor: {{ $data[0]->nomor_surat }} tanggal {{ $data[0]->tanggal_surat }} disampaikan pertimbangan kami sebagai berikut:</h5>
                <br>
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td colspan="2">Jenis Kerugian</td>
                      <td colspan="2">{{ $data[0]->jenis_kerugian }}</td>
                    </tr>
                    {{-- <tr>
                      <td colspan="2"></td>
                      <td colspan="2"></td>
                    </tr> --}}
                    <tr>
                      <td colspan="4">Dasar perhitungan ganti rugi kehilangan/kerusakan</td>
                    </tr>
                    <tr class="text-center">
                      <th colspan="">No</th>
                      <th colspan="">Isi Kiriman</th>
                      <th colspan="">Bea Kiriman(Rp)</th>
                      <th colspan="">Nilai Pertanggungan</td>
                    </tr>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($data as $item)
                      <tr>
                        <td colspan="" class="text-center">{{ $i }}</td>
                        <td colspan="">{{ $item->isi_kiriman }}</td>
                        <td colspan="">{{ "Rp " . number_format($item->biaya_kirim, 2, ",", ".") }}</td>
                        <td colspan="">{{ "Rp " . number_format($item->nilai_ganti_rugi, 2, ",", ".") }}</td>
                      </tr>
                    @endforeach
                    @php
                        $i++;
                    @endphp
                    <tr>
                      <td colspan="4">Menyetujui untuk dibayarkan kepada pelanggan sebesar Rp. {{ $data[0]->nilai_ganti_rugi }} dengan rincian:</td>
                    </tr>
                    <tr>
                      <td colspan="2">Menjadi beban perusahaan</td>
                      <td colspan="2">{{ "Rp " . number_format($data[0]->beban_perusahaan, 2, ",", ".") }}</td>
                    </tr>
                    <tr>
                      <td colspan="2">Menjadi beban pegawai</td>
                      <td colspan="2">{{ "Rp " . number_format($data[0]->beban_pegawai, 2, ",", ".") }}</td>
                    </tr>
                    <tr>
                      <td colspan="2">Menjadi beban mitra</td>
                      <td colspan="2">{{ "Rp " . number_format($data[0]->beban_mitra, 2, ",", ".") }}</td>
                    </tr>
                  </tbody>
                </table>
                <h5 class="h5 mt-5 mb-5" style="color: black;">Demikian pertimbangan kami, atas serjasamanya diucapkan terimakasih.</h5>
                <div class="row mt-5">
                  <div class="col-lg-6 text-center">
                    
                  </div>
                  <div class="col-lg-6 text-center">
                    <div class="col-12">
                      <label for="">Kepala Kantor Pos Surabaya 60000</label>
                      <br><br><br><br><br><br>
                      <div class="col-12">
                        <label class="fw-bold text-dark"><u>Imanuel Agoeng Noegroho</u></label>
                      </div>
                      <div class="col-12">
                        <label class="fw-bold text-dark">NIPPOS. 973335737</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer mt-5">
              <div class="form-navigation">
                <div class="row">
                  <div class="col-auto me-auto">
                    <button type="button" class="previous btn btn-outline-primary btn-sm"><i class="bi bi-caret-left-fill"></i> Kembali</button>
                  </div>
                  <div class="col-auto">
                    <button type="button" class="next btn btn-outline-primary btn-sm">Berikutnya <i class="bi bi-caret-right-fill"></i></button>
                    <a href="../../printPDF/{{ $data[0]->id }}" id="printPDF" class="btn btn-outline-success btn-sm"><i class="bi bi-file-earmark-pdf"></i> Print PDF</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  $(function(){
      var $sections = $('.form-section');
      

      function navigateTo(index){
        $sections.removeClass('current').eq(index).addClass('current');
        $('.form-navigation .previous').toggle(index>0);
        var atTheEnd = index >= $sections.length - 1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation #printPDF').toggle(atTheEnd);
      }

      function curIndex()
      {
        return $sections.index($sections.filter('.current'));
      }

      $('.form-navigation .previous').click(function(){
        navigateTo(curIndex()-1);
        
        var step = curIndex()+1;
            step = step.toFixed();
          $("#stepForm").text("Form JGR-"+step)
      });
      $('.form-navigation .next').click(function(){
        
          navigateTo(curIndex()+1);
          var step = curIndex()+1;
            step = step.toFixed();
          $("#stepForm").text("Form JGR-"+step)
        });
      $sections.each(function(index,section){
        $(section).find(':input').attr('data-parsley-group','block-'+index);
      });
      navigateTo(0);

    });
</script>