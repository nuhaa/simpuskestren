@extends('layouts.app')
{{-- @section('css_partials')

@endsection --}}
@section('content')
  <article class="message is-primary">
    <div class="message-header">
      <p>Rekam Medis </p>
      <u>({{ $dataCounts }})</u>
      {{-- {{ dd(auth()->user()) }} --}}
    </div>
    <div class="message-body">
      <div class="table-container">
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Periksa</th>
              <th>Diagnosa</th>
              <th>Keterangan</th>
              <th>Obat</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($register as $val)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ \Carbon\Carbon::parse($val->date_check)->format('d-m-Y') }}</td>
              @foreach ($val['medicalRecords'] as $key)
              <td>
                  Diagnosa Awal: <u>"{{ $key['first_diagnosis'] }}"</u> <br>
                  Diagnosa Dokter: <u>"{{ $key['doctor_diagnosis'] }}"</u>
              </td>
              <td>{{ $key['keterangan'] }}</td>
              @endforeach
              <td>
              @foreach ($data['nama'] as $key)
                  - {{ $key['name'] }} ( {{ $key['aturan_pakai'] }} )
                  <br>
              @endforeach
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </article>
@endsection
