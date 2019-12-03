@extends('layouts.app')
{{-- @section('css_partials')

@endsection --}}
@section('content')
  <article class="message is-primary">
    <div class="message-header">
      <p>Riwayat Pendaftaran </p>
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
              <th>Status Periksa</th>
              <th>Keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1.</td>
              <td>01-01-2020</td>
              <td><span class="tag is-primary">Selesai</span></td>
              <td>Keluhan</td>
              <td><button class="button is-primary">Lihat Detail</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </article>
@endsection
