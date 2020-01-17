@extends('admin.templates.default');

@section('content')
@include('admin.templates.partials._alert')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:inline">
              Report Data
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width:10px">No</th>
              <th>Tanggal</th>
              <th>Jumlah Pasien</th>
              <th>Poli Umum</th>
              <th>Poli Gigi</th>
              <th>Poli KIA</th>
            </tr>
            {{-- {{ dd($isi) }} --}}
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
          </table>
        </div>
        <div class="box-footer clearfix">
        </div>
      </div>
    </div>
  </div>
@endsection
