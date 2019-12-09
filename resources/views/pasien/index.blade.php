@extends('layouts.app')
@section('css_partials')
  <link href="{{ asset('plugin/datepicker/css/datepicker.css') }}" rel="stylesheet">
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
                  {{-- <i class="fab fa-address-book"></i> --}}
                  <img src="{{ asset('images/document.gif') }}" alt="">
                </span>
                <span>Ambil Kartu Antrian</span>
              </button>
          </div>
        </div>
      </section>
      <div id="ambil-kartu" class="modal">
        {{-- <div class="modal-background"></div> --}}
        <div class="modal-card">
          <header class="modal-card-head" style="background:#00d1b2">
            <p class="modal-card-title">Silakan Ambil Nomor Antrian</p>
            <button class="delete" aria-label="close"></button>
          </header>
          <section class="modal-card-body">
            <input type="text" id="datepicker">
          </section>
          <footer class="modal-card-foot">
            <button class="button is-success">Ambil</button>
            <button class="button">Cancel</button>
          </footer>
        </div>
      </div>
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
@endsection

@section('script_part')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{ asset('plugin/datepicker/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('plugin/datepicker/js/locales/bootstrap-datepicker.id.js') }}"></script>
  <script>
  $(function () {
  		$('#datepicker').datepicker({
    		autoclose: true
    	});
	});
  // Modals
  document.addEventListener('DOMContentLoaded', function () {

      var rootEl = document.documentElement;
      var allModals = getAll('.modal');
      var modalButtons = getAll('.modal-button');
      var modalCloses = getAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button');

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
