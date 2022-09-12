<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> --}}
  </head>
  <body>
    <div class="row">
        <div class="col-md-auto me-auto">
            <h4>Laporan Pengaduan Pelanggan Pos Indonesia - Surabaya 60000</h4>
        </div>
        <div class="col-auto ">
            <label>Date Report: {{ now() }}</label>
        </div>
    </div>
    <br>
    <table class="table table-striped table-sm me-5 ms-5">
        <thead class="text-center">
          <tr>
            <th scope="col" style="width: 5%;">ID </th>
            <th scope="col" style="width: 11,1%;">Ketegori Pengaduan</th>
            <th scope="col" style="width: 11,1%;">Produk</th>
            <th scope="col" style="width: 11,1%;">Pengadu</th>
            <th scope="col" style="width: 11,1%;">Resi</th>
            <th scope="col" style="width: 13,1%;">Topik</th>
            <th scope="col" style="width: 13,1%;">Respon Admin</th>
            <th scope="col" style="width: 11,1%;">Tanggal</th>
            <th scope="col" style="width: 11,1%;">Status</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td class="text-center">{{ $item->id_Pengaduan }}</a></td>
                <td class="text-center">{{ (ucfirst(strtolower($item->jenis_Pengaduan))) }}</td>
                <td class="text-center">{{ (ucfirst(strtolower($item->jenis_Kiriman))) }}</td>
                <td class="text-center">{{ (ucfirst(strtolower($item->nama_Pelanggan))) }}</td>
                <td class="text-center">{{ $item->nomor_Resi }}</td>
                <td class="text-center">{{ (ucfirst(strtolower($item->isi_Pengaduan))) }}</td>
                <td class="text-center">{{ (ucfirst(strtolower($item->respon_admin))) }}</td>
                <td class="text-center">{{ $item->created_at }}</td>
                <td class="text-center">{{ (ucfirst(strtolower($item->status))) }}</td>
            </tr>
            @endforeach
        </tbody>
  </body>
</html>

   