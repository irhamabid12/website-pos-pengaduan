<head>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .table td, .table th { padding: 2; }
    .page_break { page-break-before: always; }
  </style>
</head>
<main id="main" class="main"> 
  <section style=" font-family: 'Times New Roman';font-size:12px;">
    <div class="row">
        <div class="card">
          <div class="card-header" style="background-color: white;">
            <div class="row">
              <div class="col-auto me-auto">
                {{-- <img src="{{ asset('assets/img/logo-black.png') }}" alt="" style="width:120px;"> --}}
                <h4 class="h4 fw-bold float-right mb-5" id="stepForm" style="color: black;">Form JGR-1</h4>
              </div>
              <div class="col-auto">
                <br><br>
                <p class="mb-2" style="color: black; margin-left:520px;">Jaminan Ganti Rugi Kiriman Domestik</p>
                <br>
              </div>
              
            </div>
          </div>
          <div class="card-body">
            <div class="form-section">
              <div class="d-flex justify-content-center">
                <h6 class="h6 fw-bold " style="color: black;">FORMULIR PENGADUAN</h6>
              </div>
              <br>
              <table class="table table-striped table-bordered">
                <tbody>
                  <tr style="margin-top: 0px;">
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
                <label>Yang bertanda tangan dibawah ini, saya:</label>
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
                <div class="col-12">
                  <label>Menyatakan bahwa kiriman yang saya kirim/seharusnya saya terima berupa {{ $arr_nomorSurat[1] }} dengan data sebagai berikut:</label>
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
                    <td scope="row" style="width: 25%">{{ $data[0]->biaya_kirim }}</td>
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
                <h6 class="fw-bold text-dark"><u>Keterangan Kiriman :</u></h6>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" style="top:-9px" type="radio" name="isiBarang" id="isiBarang1" value="Barang pribadi"
                        @if ($data[0]->keterangan_isi_kiriman == 'Barang Pribadi'):
                            {{ 'checked' }}
                        @endif>
                        <label class="form-check-label" for="isiBarang1">Barang pribadi</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" style="top:-9px;" type="radio" name="isiBarang" id="isiBarang2" value="Contoh"
                        @if ($data[0]->keterangan_isi_kiriman == 'Contoh'):
                            {{ 'checked' }}
                        @endif>
                        <label class="form-check-label" for="isiBarang2">Contoh</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" style="top:-9px;" type="radio" name="isiBarang" id="isiBarang3" value="Dokumen"
                        @if ($data[0]->keterangan_isi_kiriman == 'Dokumen'):
                            {{ 'checked' }}
                        @endif>
                        <label class="form-check-label" for="isiBarang3">Dokumen</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" style="top:-9px;" type="radio" name="isiBarang" id="isiBarang4" value="Barang Dagang"
                        @if ($data[0]->keterangan_isi_kiriman == 'Barang Dagang'):
                            {{ 'checked' }}
                        @endif>
                        <label class="form-check-label" for="isiBarang4">Barang Dagang</label>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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
              <div class="col-12">
                <h6 class="fw-bold text-dark"><u>Jenis Pengaduan :</u></h6>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input"  style="top:-9px" type="checkbox" value="" 
                          @if ($data[0]->jenis_kerugian == 'Kehilangan'):
                              {{ 'checked' }}
                          @endif  
                        disabled>
                        <label class="form-check-label" for="">
                          Kiriman belum diterima
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input"  style="top:-9px" type="checkbox" value="" 
                        @if ($data[0]->jenis_kerugian == 'Kerusakan'):
                            {{ 'checked' }}
                        @endif    
                        disabled>
                        <label class="form-check-label" for="">
                          Isi kiriman rusak
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input"  style="top:-9px" type="checkbox" value="" 
                        @if ($data[0]->jenis_kerugian == 'Keterlambatan'):
                            {{ 'checked' }}
                        @endif  
                        disabled>
                        <label class="form-check-label" for="">
                          Keterlambatan
                        </label>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td style="width: 50%;">
                      <div class="text-center">
                        <label for="">Customer Service</label>
                        <br><br><br><br><br><br>
                          <label class="font-weight-bold text-dark"><u>{{ ucfirst(auth()->user()->name) }}</u></label>
                      </div>
                      <div class="text-center">
                        <label class="font-weight-bold ">NIPPOS. {{ auth()->user()->nipPos }}</label>
                      </div>

                    </td>
                    <td style="width: 50%;">
                      <div class="text-center">
                        <label for="">Pelanggan</label>
                        <br><br><br><br><br><br>
                        <label class="font-weight-bold text-dark"><u>{{ ucfirst($data[0]->nama_pelanggan) }}</u></label>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="page_break"></div>
        <div class="card">
          <div class="card-header" style="background-color: white;">
            <div class="row">
              <div class="col-auto me-auto">
                {{-- <img src="{{ asset('assets/img/logo-black.png') }}" alt="" style="width:120px;"> --}}
                <h4 class="h4 fw-bold float-right mb-5" id="stepForm" style="color: black;">Form JGR-2</h4>
              </div>
              <div class="col-auto">
                <br><br>
                <p class="mb-2" style="color: black; margin-left:520px;">Jaminan Ganti Rugi Kiriman Domestik</p>
                <br>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-section">
              <div class="float-center">
                <h6 class="h6 fw-bold " style="color: black;">PENGAJUAN TUNTUTAN GANTI RUGI</h6>
              </div>
              <br><br>
              <div class="row">
                <div class="col-9">
                </div>
                <div style="margin-left: 600px;">
                    <p class="p" style="color: black;">Surabaya, {{ date('D m Y') }}</p>
                    <p class="p" style="color: black;">Kepada Kepala Kantor Pos Surabaya 60000</p>
                </div>                
                <p class="p" style="color: black;">Yang bertanda tangan dibawah ini, saya:</p>
                <table class="table table-striped table-bordered">
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
                <p class="p" style="color: black;">Menyatakan bahwa kami adalah pengirim dari kiriman sebagaimana tersebut dalam formulir nomor: {{ $data[0]->nomor_surat }} dengan ini mengajukan tuntutan ganti rugi atas {{ $data[0]->jenis_kerugian }} sebesar {{ "Rp " . number_format($data[0]->nilai_ganti_rugi, 2, ",", ".") }} </p>
                <br>
                <p class="p" style="color: black;">Atas perhatiannya dan kerjasama diucapkan terimakasih.</p>
                
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td style="width: 50%;">
                        <div class="text-center">
                          <label for="">Customer Service</label>
                          <br><br><br><br><br><br>
                            <label class="font-weight-bold text-dark"><u>{{ ucfirst(auth()->user()->name) }}</u></label>
                        </div>
                        <div class="text-center">
                          <label class="font-weight-bold ">NIPPOS. {{ auth()->user()->nipPos }}</label>
                        </div>
  
                      </td>
                      <td style="width: 50%;">
                        <div class="text-center">
                          <label for="">Pelanggan</label>
                          <br><br><br><br><br><br>
                          <label class="font-weight-bold text-dark"><u>{{ ucfirst($data[0]->nama_pelanggan) }}</u></label>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="page_break"></div>
        <div class="card">
          <div class="card-header" style="background-color: white;">
            <div class="row">
              <div class="col-auto me-auto">
                {{-- <img src="assets/img/logo-black.png" alt="" style="width:120px;"> --}}
                <h4 class="h4 fw-bold float-right mb-5" id="stepForm" style="color: black;">Form JGR-3</h4>
              </div>
              <div class="col-auto">
                <br><br>
                <p class="mb-2" style="color: black; margin-left:520px;">Jaminan Ganti Rugi Kiriman Domestik</p>
                <br>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-section">
              <div class="d-flex justify-content-center mt-2">
                <h6 class="h6 fw-bold " style="color: black;">PENGAJUAN TUNTUTAN GANTI RUGI</h6>
              </div>
              <br>
              <div class="row">
                <div class="col-9">
                </div>
                <div style="margin-left: 630px">
                    <p class="p" style="color: black;">Surabaya, {{ date('D m Y') }}</p>
                    <p class="p" style="color: black;">Kepada Ka. Regional VII Surabaya 60000</p>
                </div>
                <p class="p mt-5" style="color: black;">Merujuk Pengajuan Tuntutan Ganti Rugi atas pengaduan nomor: {{ $data[0]->nomor_surat }} tanggal {{ $data[0]->tanggal_surat }} disampaikan pertimbangan kami sebagai berikut:</p>
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
                <p class="p" style="color: black;">Demikian pertimbangan kami, atas serjasamanya diucapkan terimakasih.</p>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td style="width: 50%;">
  
                      </td>
                      <td style="width: 50%;">
                        <div class="text-center">
                          <label for="">Kepala Kantor Pos Surabaya 60000</label>
                          <br><br><br><br><br><br>
                            <label class="fw-bold text-dark"><u>Imanuel Agoeng Noegroho</u></label>
                            <br>
                            <label class="fw-bold text-dark">NIPPOS. 973335737</label>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
</main>
