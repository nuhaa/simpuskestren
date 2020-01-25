<h3>Report Data Pasien Simpuskestren</h3>
<table border="1" width="100%">
  <tr>
    <th style="width:10px">No</th>
    <th>Tanggal</th>
    <th>Jumlah Pasien</th>
    <th>Poli Umum</th>
    <th>Poli Gigi</th>
    <th>Poli KIA</th>
  </tr>
  {{-- {{ dd($isi) }} --}}
  @if ($isi != 0)
    @foreach ($isi as $data)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data['tgl'] }}</td>
        <td>{{ $data['jml'] }}</td>
        <td>
          @foreach ($data['umum'] as $key)
            {{ $key->jml }}
          @endforeach
        </td>
        <td>
          @foreach ($data['gigi'] as $key)
            {{ $key->jml }}
          @endforeach
        </td>
        <td>
          @foreach ($data['kia'] as $key)
            {{ $key->jml }}
          @endforeach
        </td>
      </tr>
    @endforeach
  @else
  <tr>
    <td colspan="6"><i><center>Data Tidak Ditemukan</center></i></td>
  </tr>
  @endif
</table>
