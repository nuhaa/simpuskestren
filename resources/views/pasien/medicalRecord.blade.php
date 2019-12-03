@extends('layouts.app')
{{-- @section('css_partials')

@endsection --}}
@section('content')
  <article class="message is-primary">
    <div class="message-header">
      <p>Rekam Medis </p>
      <u>(N/A)</u>
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
              <th>Hasil Periksa</th>
              <th>Obat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1.</td>
              <td>01-01-2020</td>
              <td>- Hasil Diagnosa <br> - Hasil Diagnosa</td>
              <td>- Hasil Dokter <br> - Hasil Dokter</td>
              <td>- Obat 1 <br> - Obat 2</td>
              <td><button class="button is-primary">Lihat Detail</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </article>
@endsection
