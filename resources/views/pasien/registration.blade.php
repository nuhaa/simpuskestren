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
                        Wait Qaqa
                    </section>
                    <footer class="modal-card-foot">
                        <button class="modal-button-close button">Kembali</button>
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
});
</script>
@endsection
