@extends('layouts.app')
@section('css_partials')
  <style>
  .marquee {
  	max-width: 100%;
  	margin: 0 auto;
  	white-space: nowrap;
  	overflow: hidden;
  	box-sizing: border-box;
  }

  .marquee span {
  	display: inline-block;
  	padding-left: 100%;
  	/* show the marquee just outside the paragraph */
  	animation: marquee 15s linear infinite;
  }

  .marquee span:hover {
  	animation-play-state: paused
  }


  /* Make it move */

  @keyframes marquee {
  	0% {
  	transform: translate(0, 0);
  	}
  	100% {
  	transform: translate(-100%, 0);
  	}
  }
  </style>
@endsection
@section('content')
    @auth
      <div class="columns">
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
    @endauth
    @guest
      <div class="columns is-multiline">
        <div class="column is-12">
          <button class="button is-normal is-fullwidth">
            <p class="marquee">
              <span style="color:#000">
                 Silakan Mendaftar Apabila Belum Memiliki Akun
              </span>
            </p>
        </button>
        </div>
        <div class="column is-12">
          <div class="columns for-first">
            <div class="column is-4">
              <section class="hero is-small is-danger is-bold hero-1">
                <div class="hero-body">
                  <div class="container">
                    <center><h1 class="title"><u>Poli Umum</u> <br>Antrian #{{ $umum }} </h1><center>
                  </div>
                </div>
              </section>
            </div>
            <div class="column is-4">
              <section class="hero is-small is-warning is-bold hero-2">
                <div class="hero-body">
                  <div class="container">
                    <center><h1 class="title"><u>Poli Gigi</u> <br>Antrian #{{ $gigi }} </h1><center>
                  </div>
                </div>
              </section>
            </div>
            <div class="column is-4">
              <section class="hero is-small is-primary is-bold hero-3">
                <div class="hero-body">
                  <div class="container">
                    <center><h1 class="title"><u>Poli KIA</u> <br>Antrian #{{ $kia }} </h1><center>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
        <div class="column is-6">
          <section class="hero is-small is-primary is-bold">
            <div class="hero-body">
              <div class="container">
                <h1 class="title">
                  Pasien Santri
                </h1>
                <h2 class="subtitle">
                  Digunakan untuk pendaftaran khusus bagi santri tebuireng
                </h2>
              </div>
            </div>
            <a href="{{ route('register') }}?status=santri" class="button is-warning is-fullwidth">Daftar&nbsp;<b>(Santri)</b></a>
          </section>
        </div>
        <div class="column is-6">
          <section class="hero is-small is-warning is-bold">
            <div class="hero-body">
              <div class="container">
                <h1 class="title">
                  Pasien Umum
                </h1>
                <h2 class="subtitle">
                  Digunakan untuk pendaftaran khusus bagi masyarakat umum
                </h2>
              </div>
            </div>
            <a href="{{ route('register') }}?status=umum" class="button is-primary is-fullwidth">Daftar&nbsp;<b>(Umum)</b></a>
          </section>
        </div>
      </div>
    @endguest
@endsection
