@extends('layouts.app')
@section('css_partials')
  <link href="{{ asset('plugin/bulma-modal-fx/css/modal-fx.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugin/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('content')
  <div class="columns is-multiline">
    <div class="column is-12">
      <section class="hero is-small is-danger is-bold ">
        <div class="hero-body">
          <div class="container">
            <center><h1 class="title">Ambil Antrian</h1><center>
              <button class="button modal-button" data-target="ambil-kartu" aria-haspopup="true">
                <span class="icon">
                  {{-- <i class="fas fa-user"></i> --}}
                  <img src="{{ asset('images/document.gif') }}" alt="">
                </span>
                <span>Ambil Kartu Antrian</span>
              </button>
          </div>
        </div>
      </section>

    </div>
    <div class="column is-6">
      <section class="hero is-small is-primary is-bold">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Jumlah Daftar
            </h1>
            <h2 class="subtitle">
              0
            </h2>
          </div>
        </div>
      </section>
    </div>
    <div class="column is-6">
      <section class="hero is-small is-warning is-bold">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Jumlah Rekam Medis
            </h1>
            <h2 class="subtitle">
              0
            </h2>
          </div>
        </div>
      </section>
    </div>
  </div>
  {{-- modal --}}
  <div id="ambil-kartu" class="modal modal-full-screen modal-fx-fadeInScale">
      <div class="modal-content modal-card ">
          <header class="modal-card-head" style="background:#00d1b2">
              <p class="modal-card-title for-header">Pilih Poli</p>
              <button class="modal-button-close delete" aria-label="close"></button>
          </header>
          <section class="modal-card-body ">
            <div class="columns for-first">
              <div class="column is-4">
                <section class="hero is-small is-danger is-bold hero-1">
                  <div class="hero-body">
                    <div class="container">
                      <center><h1 class="title">Poli <br>Umum</h1><center>
                    </div>
                  </div>
                </section>
              </div>
              <div class="column is-4">
                <section class="hero is-small is-warning is-bold hero-2">
                  <div class="hero-body">
                    <div class="container">
                      <center><h1 class="title">Poli <br>Gigi</h1><center>
                    </div>
                  </div>
                </section>
              </div>
              <div class="column is-4">
                <section class="hero is-small is-primary is-bold hero-3">
                  <div class="hero-body">
                    <div class="container">
                      <center><h1 class="title">Poli <br>KIA</h1><center>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </section>
          <footer class="modal-card-foot">
              <button class="modal-button-close button is-danger reload">Atur Ulang</button>
              <button class="modal-button-close button">Kembali</button>
          </footer>
      </div>
  </div>
@endsection

@section('script_part')
  <script src="{{ asset('plugin/bulma-modal-fx/js/modal-fx.min.js') }}"></script>
  <script src="{{ asset('plugin/sweetalert/sweetalert.min.js') }}"></script>
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

      $(".hero-1").click(function(){
          $(".for-header").replaceWith('<p class="modal-card-title for-final">Pilih Tanggal (Poli Umum)</p>');
          $.ajax({
             type: "POST",
             url:"{{ route('pasien.form.tanggal') }}",
             data:{ poli:'1', name:'Poli Umum', _token: '{{ csrf_token() }}' },
             success:function(data){
                 $(".for-first").replaceWith(data);;
             }
          });
      });

      $(".hero-2").click(function(){
          $(".for-header").replaceWith('<p class="modal-card-title for-final">Pilih Tanggal (Poli Gigi)</p>');
          $.ajax({
             type: "POST",
             url:"{{ route('pasien.form.tanggal') }}",
             data:{ poli:'2', name:'Poli Gigi', _token: '{{ csrf_token() }}' },
             success:function(data){
                 $(".for-first").replaceWith(data);;
             }
          });
      });

      $(".hero-3").click(function(){
          $(".for-header").replaceWith('<p class="modal-card-title for-final">Pilih Tanggal (Poli KIA)</p>');
          $.ajax({
             type: "POST",
             url:"{{ route('pasien.form.tanggal') }}",
             data:{ poli:'3', name:'Poli KIA', _token: '{{ csrf_token() }}' },
             success:function(data){
                 $(".for-first").replaceWith(data);;
             }
          });
      });
  });
  </script>
@endsection
