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
  <link rel="stylesheet" href="{{ asset('assets/css/styleDashboard.css')}}">
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
<section>
        <div class="row">
            <div class="card">
              <div class="card-header">
                <div class="progress mt-3">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
                <div class="card-body">
                    <form class="row g-3 form-gantiRugi" action="../newInsertGantiRugi" method="post">
                      @csrf
                          <div class="form-section row mt-3">
                            <div class="col-3">
                              <label for="kantor_pos" class="form-label">Kantor Pos</label>
                              <input type="text" class="form-control" name="kantor_pos" value="Surabaya 60000" >
                            </div>

                            <div class="col-4">
                              <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                              <input type="date" class="form-control" name="tanggal_surat">
                            </div>

                            <div class="col-5">
                              <label for="id_surat" class="form-label">Nomor Id Pelanggan</label>
                              <div class="input-group">
                                <input type="hidden" class="form-control" value="91" name="id_surat_1">
                                <span class="input-group-text">9</span>
                                <span class="input-group-text">/</span>
                                <select class="form-select" id="id_surat_2" name="id_surat_2">
                                  <option value="" selected>Pilih Jenis Surat</option>
                                  <option value="EMS">EMS</option>
                                  <option value="PE">PE</option>
                                  <option value="PKH">PKH</option>
                                  <option value="PP Reguler">PP Reguler</option>
                                  <option value="Cargopos">Cargopos</option>
                                </select>
                                <span class="input-group-text">/</span>
                                <select class="form-select" id="id_surat_3" name="id_surat_3">
                                  @php
                                  for($i=date('Y')-1; $i>=date('Y')-32; $i-=1){
                                  echo "<option value='$i'>$i</option>";
                                  }
                                  @endphp
                                </select>
                              </div>
                            </div>

                            <div class="col-3">
                              <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                              <input type="text" class="form-control" name="nama_pelanggan" >
                            </div>

                            <div class="col-4">
                                <label for="hp_Pelanggan" class="form-label">Nomor HP Pelanggan</label>
                                <input type="telp" class="form-control" name="hp_Pelanggan" >
                            </div>

                            <div class="col-5">
                              <label for="alamat_pelanggan" class="form-label">Alamat Pelanggan</label>
                              <textarea class="form-control" style="height: 10px" name="alamat_pelanggan"></textarea>
                            </div>

                            <div class="row mt-5">
                              <div class="col-lg-6">
                                <div class="row">
                                  <div class="col-6">
                                    <label for="nomor_resi" class="form-label">Nomor Resi</label>
                                    <input type="telp" class="form-control" name="nomor_resi" >
                                  </div>
                                  <div class="col-6">
                                    <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
                                    <input type="date" class="form-control" name="tanggal_kirim" >
                                  </div>

                                  <div class="col-6">
                                    <label for="kantor_asal_kiriman" class="form-label">Kantor Asal Kiriman</label>
                                    <input type="telp" class="form-control" name="kantor_asal_kiriman" >
                                  </div>
                                  <div class="col-6">
                                    <label for="berat" class="form-label">Berat Barang</label>
                                    <div class="input-group mb-3">
                                      <input type="number" class="form-control" name="berat" >
                                      <span class="input-group-text">Kg</span>
                                    </div>
                                  </div>
                                  <div class="col-12 mb-3">
                                    <label for="biaya_kirim" class="form-label">Biaya Kirim</label>
                                    <input type="telp" class="form-control" name="biaya_kirim" value="0" >
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="row">
                                  <div class="col-6">
                                    <label for="nilai_barang" class="form-label">Nilai Barang</label>
                                    <input type="telp" class="form-control" name="nilai_barang" value="0">
                                  </div>
                                  <div class="col-6">
                                    <label for="nilai_jaminan_gr" class="form-label">Nilai Jaminan Ganti Rugi</label>
                                    <input type="telp" class="form-control" name="nilai_jaminan_gr" value="0">
                                  </div>
                                  <div class="col-12">
                                    <label for="jenis_pengaduan" class="form-label">Jenis Pengaduan</label>
                                    <select class="form-select mb-3" name="jenis_Pengaduan" >
                                      <option value="" selected>Pilih Jenis Pengaduan</option>
                                      @foreach ($jenis as $jns)
                                        <option value="{{ $jns->nama_jpengaduan }}">{{ $jns->nama_jpengaduan }}</option> 
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-12">
                                    <label for="jenis_kiriman" class="form-label">Jenis Kiriman</label>
                                    <select class="form-select mb-3" name="jenis_kiriman" > 
                                      <option value="" selected>Pilih Jenis Kiriman</option>
                                      @foreach ($produk as $prod)
                                        <option value="{{ $prod->nama_produk }}">{{ $prod->nama_produk }}</option> 
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row mt-5">
                              <div class="col-lg-6 border">
                                <div class="row">
                                  <div class="col-6">
                                    <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                                    <input type="telp" class="form-control" name="nama_pengirim" >
                                  </div>
                                  <div class="col-6">
                                    <label for="email_pengirim" class="form-label">Email Pengirim</label>
                                    <input type="email" class="form-control" name="email_pengirim" >
                                  </div>

                                  <div class="col-6">
                                    <label for="nomor_hp_pengirim" class="form-label">Nomor HP Pengirim</label>
                                    <input type="telp" class="form-control" name="nomor_hp_pengirim" >
                                  </div>
                                  <div class="col-6">
                                      <label for="kode_pos_pengirim" class="form-label">Kode Pos Pengirim</label>
                                      <input type="telp" class="form-control" name="kode_pos_pengirim" >
                                  </div>
                                  <div class="col-12">
                                    <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
                                    <textarea class="form-control mb-2" style="height: 80px" name="alamat_pengirim"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 border">
                                <div class="row">
                                  <div class="col-6">
                                    <label for="nama_penerima" class="form-label">Nama penerima</label>
                                    <input type="telp" class="form-control" name="nama_penerima" >
                                  </div>
                                  <div class="col-6">
                                    <label for="email_penerima" class="form-label">Email penerima</label>
                                    <input type="email" class="form-control" name="email_penerima" >
                                  </div>

                                  <div class="col-6">
                                    <label for="nomor_hp_penerima" class="form-label">Nomor HP penerima</label>
                                    <input type="telp" class="form-control" name="nomor_hp_penerima" >
                                  </div>
                                  <div class="col-6">
                                      <label for="kode_pos_penerima" class="form-label">Kode Pos penerima</label>
                                      <input type="telp" class="form-control" name="kode_pos_penerima" >
                                  </div>
                                  <div class="col-12">
                                    <label for="alamat_penerima" class="form-label">Alamat penerima</label>
                                    <textarea class="form-control mb-2" style="height: 80px" name="alamat_penerima"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-12">
                              <label for="alamat_penerima" class="form-label fw-bold">Keterangan Isi Kiriman</label>
                            </div>
                            <div class="col-3">
                              <input class="form-check-input" type="radio" name="isiBarang" id="isiBarang1" value="Barang pribadi">
                              <label class="form-check-label" for="isiBarang1">
                                Barang pribadi
                              </label>
                            </div>
                            <div class="col-3">
                              <input class="form-check-input" type="radio" name="isiBarang" id="isiBarang2" value="Contoh">
                              <label class="form-check-label" for="isiBarang2">
                                Contoh
                              </label>
                            </div>
                            <div class="col-3">
                              <input class="form-check-input" type="radio" name="isiBarang" id="isiBarang3" value="Dokumen">
                              <label class="form-check-label" for="isiBarang3">
                                Dokumen
                              </label>
                            </div>
                            <div class="col-3">
                              <input class="form-check-input" type="radio" name="isiBarang" id="isiBarang4" value="Barang Dagang">
                              <label class="form-check-label" for="isiBarang4">
                                Barang Dagang
                              </label>
                            </div>
                          </div>

                          <div class="form-section row" id="dynamicForm">
                            <div class="col-lg-12 mt-3">
                              <div class="row" id="inputForm">
                                <div class="col-3 mb-2">
                                  <input type="number" class="form-control form-control-sm" name="jumlah" placeholder="Jumlah">
                                </div>
    
                                <div class="col-6 mb-2">
                                  <input type="text" class="form-control form-control-sm" name="isi_kiriman" placeholder="Isi Kiriman">
                                </div>
    
                                <div class="col-3 mb-2">  
                                  <input type="number" class="form-control form-control-sm" name="berat_isi_barang" placeholder="Berat (Kg)">
                                </div>
                                <div class="col-3">
                                  <input type="text" class="form-control form-control-sm" name="bahan" placeholder="Bahan">
                                </div>
                                <div class="col-3">
                                  <input type="text" class="form-control form-control-sm" name="negara_pembuat" placeholder="Negara Pembuat">
                                </div>
                                <div class="col-3"> 
                                    <div class="input-group input-group-sm">
                                      <input type="number" class="form-control form-control-sm" name="nilai_isi_barang" placeholder="Nilai Barang (Rp)">
                                    </div>
                                </div>
                                <div class="col-3">
                                  <button class="btn btn-outline-danger btn-sm btn-hapus"><i class="bi bi-dash-square"></i> Hapus</button>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12 mt-3" id="newForm">
                              
                            </div>
                            

                            <div class="col-12 mt-2">
                              <button type="button" class="btn btn-outline-success btn-sm btn-tambah"><i class="bi bi-plus-square"></i> Tambah</i></button>
                            </div>
                          </div>

                          <div class="form-section row mt-3">
                            <div class="col-12">
                              <label for="jumlah" class="form-label card-title me-5">Jenis Kerugian:</label>
                                <input type="radio" class="btn-check" id="keterlambatan-btn" name="jenis_kerugian" data-bs-toggle="collapse" data-bs-target="#keterlambatan" value="Keterlambatan">
                                <label class="btn btn-sm btn-outline-primary" for="keterlambatan-btn">Keterlambatan</label>

                                <input type="radio" class="btn-check" id="kehilangan-btn" name="jenis_kerugian" data-bs-toggle="collapse" data-bs-target="#kehilangan" value="Kehilangan">
                                <label class="btn btn-sm btn-outline-primary" for="kehilangan-btn">Kehilangan</label>

                                <input type="radio" class="btn-check" id="kerusakan-btn" name="jenis_kerugian" data-bs-toggle="collapse" data-bs-target="#kerusakan" value="Kerusakan">
                                <label class="btn btn-sm btn-outline-primary" for="kerusakan-btn">Kerusakan</label>
                                

                                <div class="collapse mt-3" id="keterlambatan">
                                  <div class="card card-body">
                                    <div class="row border">
                                      <div class="col-12 mb-3">
                                        <label for="jenis_kerugian" class="form-label">Jenis Kerugian</label>
                                        <input type="text" id="jenis_kerugian" class="form-control form-control-sm" value="Keterlambatan">
                                      </div>
                                      <div class="col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="jenis_terlambat" id="jenis_terlambat1" value="SWP Senyatanya">
                                        <label class="form-check-label" for="jenis_terlambat1">
                                          SWP Senyatanya
                                        </label>
                                      </div>
  
                                      <div class="col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="jenis_terlambat" id="jenis_terlambat2" value="Standart SWP">
                                        <label class="form-check-label" for="jenis_terlambat2">
                                          Standart SWP
                                        </label>
                                      </div>
  
                                      <div class="col-6 mb-3">
                                        <input class="form-check-input" type="radio" name="jenis_terlambat" id="jenis_terlambat3" value="Hari Libur">
                                        <label class="form-check-label" for="jenis_terlambat3">
                                          Hari Libur
                                        </label>
                                      </div>
  
                                      <div class="col-6 mb-3">
                                        <input class="form-control" type="number" name="jenis_terlambat" id="jenis_terlambat4" placeholder="Jumlah terlambat">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="collapse mt-3" id="kehilangan">
                                  <div class="card card-body">
                                    <div class="row">
                                      <div class="col-6 mb-3">
                                        <label for="jenis_kerugian" class="form-label">Jenis Kerugian</label>
                                        <input type="text" id="jenis_kerugian" class="form-control form-control-sm" value="Kehilangan">
                                      </div>
                                      
                                      <div class="col-6">
                                        <label for="jumlah-kehilangan" class="form-label">Jumlah Kehilangan</label>
                                        <select class="form-select form-select-sm" id="jumlah-kehilangan" name="jumlah_kehilangan">
                                          <option value="" selected>Pilih Jumlah Kehilangan</option>
                                          <option value="Seluruh">Seluruh</option>
                                          <option value="Sebagiakn">Sebagiakn</option>>
                                        </select>
                                      </div>
                                      
                                      <div class="col-12 mb-3">
                                        <label for="jenis-kiriman mt-3" class="form-label">Jenis Kiriman</label>
                                        <select class="form-select form-select-sm" id="jenis-kiriman" name="jenis-kiriman">
                                          <option value="" selected>Pilih Jenis Kiriman</option>
                                          <option value="EMS">EMS</option>
                                          <option value="PE">PE</option>
                                          <option value="PKH">PKH</option>
                                          <option value="PP Reguler">PP Reguler</option>
                                          <option value="Cargopos">Cargopos</option>
                                        </select>
                                      </div>
                                      
                                      <div class="col-12">
                                        <label class="form-label">Bukti Kehilangan</label>
                                        <div class="row">
                                          <div class="col-12">
                                            <input class="form-check-input" type="radio" name="bukti_kehilangan" id="buktiKehilangan1" value="Dokumen Berita Acara">
                                            <label class="form-check-label" for="buktiKehilangan1">
                                              Dokumen Berita Acara
                                            </label>
                                          </div>
                                          
                                          <div class="col-12">
                                            <input class="form-check-input" type="radio" name="bukti_kehilangan" id="buktiKehilangan2" value="Keputusan Direksi tentang jaminan ganti rugi kiriman surat dan paket">
                                            <label class="form-check-label" for="buktiKehilangan2">
                                              Keputusan Direksi tentang jaminan ganti rugi kiriman surat dan paket.
                                            </label>
                                          </div>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="collapse" id="kerusakan">
                                  <div class="card card-body">
                                    <label for="jenis_kerugian" class="form-label">Jenis Kerugian</label>
                                    <input type="text" class="form-control form-control-sm" value="Kerusakan">
                                    <label for="bukti_kerusakan" class="form-label">Nomor bukti dokumen</label>
                                    <input type="text" class="form-control form-control-sm" name="bukti_kerusakan">
                                    <label for="tanggal_dokumen" class="form-label">Tanggal Dokumen</label>
                                    <input type="date" class="form-control form-control-sm" name="tanggal_dokumen">    
                                  </div>
                                </div>
                            </div>

                            <div class="col-12">
                              <label for="jumlah" class="form-label card-title me-5">Dasar Perhitungan Ganti Rugi</label>
                            </div>

                            <div class="col-12">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Isi Kiriman</th>
                                    <th scope="col" class="text-center">Bea Kirim</th>
                                    <th scope="col" class="text-center">Nilai Ganti Rugi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row">1</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                            <div class="col-12">
                              <label for="jumlah" class="form-label card-title me-5">Rincian Perhitungan Ganti Rugi</label>
                            </div>
  
                            <div class="col-12">
                              <div class="row">
                                <div class="col-6">
                                  <label for="jumlah_ganti_rugi" class="form-label">Jumlah Ganti Rugi</label>
                                  <input type="number" class="form-control form-control-sm" name="jumlah_ganti_rugi" value="0">
                                </div>
  
                                <div class="col-6">
                                  <label for="rincian_gr1" class="form-label">Beban Perusahaan</label>
                                  <input type="number" class="form-control form-control-sm" name="rincian_gr1" value="0">
                                </div>
  
                                <div class="col-6">
                                  <label for="rincian_gr2" class="form-label">Beban Pegawai</label>
                                  <input type="number" class="form-control form-control-sm" name="rincian_gr2" value="0">
                                </div>
  
                                <div class="col-6">
                                  <label for="rincian_gr3" class="form-label">Beban Mitra</label>
                                  <input type="number" class="form-control form-control-sm" name="rincian_gr3" value="0">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-navigation">
                            <div class="row">
                              <div class="col-auto me-auto">
                                <button type="button" class="previous btn btn-outline-primary btn-sm"><i class="bi bi-caret-left-fill"></i> Kembali</button>
                              </div>
                              <div class="col-auto">
                                <button type="button" class="next btn btn-outline-primary btn-sm">Berikutnya <i class="bi bi-caret-right-fill"></i></button>
                                <button type="submit" class="submit btn btn-outline-primary btn-sm">Simpan</button>
                              </div>
                            </div>
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
    @if (Session::has('successInsert'))
      toastr.success("{{ Session::get('successInsert') }}")
    @endif
    @if (Session::has('errorInsert'))
      toastr.error("{{ Session::get('errorInsert') }}")
    @endif
    
    // multistep form js
    $(function(){
      var $sections = $('.form-section');
      

      function navigateTo(index){
        $sections.removeClass('current').eq(index).addClass('current');
        $('.form-navigation .previous').toggle(index>0);
        var atTheEnd = index >= $sections.length - 1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [type=submit]').toggle(atTheEnd);
      }

      function curIndex()
      {
        return $sections.index($sections.filter('.current'));
      }

      $('.form-navigation .previous').click(function(){
        navigateTo(curIndex()-1);
        
        var percent = parseFloat(100 / 2) * curIndex()-1;
            percent = percent.toFixed();
          $(".progress-bar")
              .css("width",percent+"%")
      });
      $('.form-navigation .next').click(function(){
        // $('.form-gantiRugi').parsley().whenValidate({
        //   group: 'block-' + curIndex()
        // }).done(function(){
          navigateTo(curIndex()+1);
          var percent = parseFloat(100 / 2) * curIndex()+1;
            percent = percent.toFixed();
          $(".progress-bar")
              .css("width",percent+"%")
        });
      // });
      $sections.each(function(index,section){
        $(section).find(':input').attr('data-parsley-group','block-'+index);
      });
      navigateTo(0);

      // $(".submit").click(function(){
      //   location.href ="newInsertGantiRugi";
      // });
    });
  </script>
  {{-- addForm --}}
  <script>
    $(".btn-tambah").click(function () {
        var html = '';
        html +='<div class="row" id="inputForm">'
        html +='<div class="col-3 mb-2">';
        html +='<input type="number" class="form-control form-control-sm" name="jumlah" placeholder="Jumlah">';
        html +='</div>';
        html +='<div class="col-6 mb-2">';
        html+='<input type="text" class="form-control form-control-sm" name="isi_kiriman" placeholder="Isi Kiriman">';
        html+='</div>';
        html+='<div class="col-3 mb-2">';  
        html+='<input type="number" class="form-control form-control-sm" name="berat_isi_barang" placeholder="Berat (Kg)">';
        html+='</div>';
        html+='<div class="col-3 mb-2">';
        html+='<input type="text" class="form-control form-control-sm" name="bahan" placeholder="Bahan">';
        html+='</div>';
        html+='<div class="col-3 mb-2">';
        html+='<input type="text" class="form-control form-control-sm" name="negara_pembuat" placeholder="Negara Pembuat">';
        html+='</div>';
        html+='<div class="col-3 mb-2">';
        html+='<div class="input-group input-group-sm">';
        html+='<input type="number" class="form-control form-control-sm" name="nilai_isi_barang" placeholder="Nilai Barang (Rp)">';
        html+='</div>';
        html+='</div>';
        html+='<div class="col-3">';
        html+='<button class="btn btn-outline-danger btn-sm btn-hapus"><i class="bi bi-dash-square"></i> Hapus</button>';
        html+='</div>';
        html+='</div>';
        $('#newForm').append(html);
    });

    // remove row
    $(document).on('click', '.btn-hapus', function () {
        $(this).closest('#inputForm').remove();
    });
  </script>
  