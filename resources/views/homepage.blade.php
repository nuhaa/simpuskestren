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
        <article class="message is-warning">
          <div class="message-header">
            <p class="marquee">
					    <span style="color:#000">
					       Silakan Mendaftar Apabila Belum Memiliki Akun
					    </span>
				    </p>
          </div>
        </article>
      </div>
      <div class="column is-6">
        <div class="box">
          <article class="media">
            <div class="media-left">
              <figure class="image is-128x128">
                <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>Pasien Santri</strong>
                  <br>
                  Digunakan untuk pendaftaran khusus bagi santri tebuireng
                </p>
                <a href="{{ route('register') }}" class="button is-primary is-fullwidth modal-button">Daftar&nbsp;<b>(santri)</b></a>
              </div>
            </div>
          </article>
        </div>

        {{-- modal --}}
        <div class="modal">
          <div class="modal-background"></div>
          <div class="modal-content">
            <!-- Any other Bulma elements you want -->
          </div>
          <button class="modal-close is-large" aria-label="close"></button>
        </div>
      </div>
      <div class="column is-6">
        <div class="box">
          <article class="media">
            <div class="media-left">
              <figure class="image is-128x128">
                <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>Pasien Umum</strong>
                  <br>
                  Digunakan untuk pendaftaran khusus bagi pasien kategori umum
                </p>
                <a href="{{ route('register') }}" class="button is-primary is-fullwidth">Daftar&nbsp; <b>(umum)</b></a>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
@endsection
