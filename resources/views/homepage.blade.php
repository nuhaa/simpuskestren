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
      <div class="column is-6">
        <section class="hero is-medium is-primary is-bold">
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
          <a href="{{ route('register') }}" class="button is-warning is-fullwidth">Daftar&nbsp;<b>(Santri)</b></a>
        </section>
      </div>
      <div class="column is-6">
        <section class="hero is-medium is-warning is-bold">
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
          <a href="{{ route('register') }}" class="button is-primary is-fullwidth">Daftar&nbsp;<b>(Umum)</b></a>
        </section>
      </div>
    </div>
@endsection
