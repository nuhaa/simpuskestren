@extends('layouts.app')
@section('css_partials')
  <link href="{{ asset('plugin/bulma-modal-fx/css/modal-fx.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugin/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('content')
  <article class="message is-primary">
    <div class="message-header">
      <p>Riwayat Pendaftaran </p>
      <p>{{ $dataCounts }} Data</p>
      {{-- {{ dd(auth()->user()) }} --}}
    </div>
    <div class="message-body">
      <div class="table-container">
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>No</th>
              <th>No Antrian</th>
              <th>Poli</th>
              <th>Tanggal Periksa</th>
              <th>Jam Periksa</th>
              <th>Status Periksa</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($datas as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->no_antrian }}</td>
              <td>
                @foreach ($data['polies'] as $poli)
                  {{ $poli['name'] }}
                @endforeach
              </td>
              <td>{{ date('d-m-Y', strtotime($data['date_check'])) }}</td>
              <td>{{ $data['time_check_start']." - ". $data['time_check_end'] }}</td>
              <td>
                @php
                    $cekTanggal = strtotime($data['date_check']);
                    $cekJam = strtotime($data['time_check_end']);
                    $cekTanggalNow = strtotime(date('Y-m-d'));
                    $cekJamNow = strtotime(date('h:i:s'));
                    $cek = $cekTanggal+$cekJam;
                    $cekNow = $cekTanggalNow+$cekJamNow;
                @endphp
                <span class="tag {{ (($cekNow > $cek) and ($data['status_check'] == 'register')) ? 'is-danger' : ($data['status_check'] == 'register' ? 'is-warning' : 'is-primary') }}">
                  {{ (($cekNow > $cek) and ($data['status_check'] == 'register')) ? 'Kadaluarsa' : $data['status_check'] }}
                </span>
              </td>
              <td><button class="button modal-button is-primary" data-target="{{ $data['id'] }}" aria-haspopup="true" {{ (($cekNow > $cek) and ($data['status_check'] == 'register')) ? 'disabled' : '' }}>Lihat Detail</button></td>
            </tr>

            <div id="{{ $data['id'] }}" class="modal is-medium modal-3dSignDown">
                <div class="modal-background"></div>
                <div class="modal-content modal-card ">
                    <header class="modal-card-head" style="background:#00d1b2">
                        <p class="modal-card-title for-header">Cetak Antrian</p>
                        <button class="modal-button-close delete" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body ">
                        <center class="is-size-3">Puskestren Tebuireng</center>
                        <center>Cukir (Depan Masjid Ulil Albab Tebuireng) Diwek Jombang</center>
                        <center>Telp. (0321) 6973389</center>
                        <hr style="margin-top:3px;margin-bottom:3px">
                        @foreach ($data['polies'] as $poli)
                          @php
                            $poliName = $poli['name'];
                          @endphp
                          <center class="is-size-4"><b>Poli {{ $poli['name'] }}</b></center>
                        @endforeach
                        <center class="is-size-1"><b>#{{ $data->no_antrian }}</b></center>
                        <center><b>Hadir Pada:</b></center>
                        <center>
                          <b>
                          {{ format_hari(\Carbon\Carbon::parse($data->date_check)->format('l')) }},
                          {{ \Carbon\Carbon::parse($data->date_check)->format('d/m/Y') }}
                          Jam: {{ $data->time_check_start }} - {{ $data->time_check_end }}
                          </b>
                        </center>
                    </section>
                    <footer class="modal-card-foot">
                        <button class="modal-button-close button">Kembali</button>
                        <a href="{{ route('pasien.export.antrian') }}?poli={{ \Crypt::encrypt($poliName) }}&antrian={{ \Crypt::encrypt($data->no_antrian) }}&hari={{ \Crypt::encrypt($data->date_check) }}&jamMulai={{ \Crypt::encrypt($data->time_check_start) }}&jamSelesai={{ \Crypt::encrypt($data->time_check_end) }}" class="button is-primary">Cetak</a>

                        {{-- <button class="button is-primary cetak" data-poli='{{ $poliName }}' data-antrian="{{ $data->no_antrian }}" data-hari="{{ $data->date_check }}" data-waktu-mulai="{{ $data->time_check_start }}" data-waktu-selesai="{{ $data->time_check_end }}">Cetak</button> --}}
                    </footer>
                </div>
            </div>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </article>

@endsection
@section('script_part')
<script src="{{ asset('plugin/bulma-modal-fx/js/modal-fx.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

    var rootEl = document.documentElement;
    var reset = getAll('.reload');
    var allModals = getAll('.modal');
    var modalButtons = getAll('.modal-button');
    var modalCloses = getAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button');

    if (reset.length > 0) {
        reset.forEach(function (el) {
            el.addEventListener('click', function () {
                window.location.href = "{{ route('pasien.index') }}";
            });
        });
    }

    if (modalButtons.length > 0) {
        modalButtons.forEach(function (el) {
            el.addEventListener('click', function () {
                var target = document.getElementById(el.dataset.target);
                rootEl.classList.add('is-clipped');
                target.classList.add('is-active');
            });
        });
    }

    if (modalCloses.length > 0) {
        modalCloses.forEach(function (el) {
            el.addEventListener('click', function () {
                closeModals();
            });
        });
    }

    document.addEventListener('keydown', function (event) {
        var e = event || window.event;
        if (e.keyCode === 27) {
            closeModals();
        }
    });

    function closeModals() {
        rootEl.classList.remove('is-clipped');
        allModals.forEach(function (el) {
            el.classList.remove('is-active');
        });
    }

    // Functions
    function getAll(selector) {
        return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
    }

    $("button.cetak").click(function(){
        var poli       = $(this).attr('data-poli');
        var antrian    = $(this).attr('data-antrian');
        var hari       = $(this).attr('data-hari');
        var jamMulai   = $(this).attr('data-waktu-mulai');
        var jamSelesai = $(this).attr('data-waktu-selesai');
        $.ajax({
           type: "POST",
           url:"{{ route('pasien.export.antrian') }}",
           data:{ poli:poli, antrian:antrian, hari:hari, jamMulai:jamMulai, jamSelesai:jamSelesai, _token: '{{ csrf_token() }}' },
        });
    });
});
</script>
@endsection
