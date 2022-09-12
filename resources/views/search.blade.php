@foreach ($datas as $item)
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


