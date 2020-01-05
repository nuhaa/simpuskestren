@extends('layouts.app')
@section('css_partials')
  <link href="{{ asset('plugin/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('content')
  <article class="message is-primary">
  <div class="message-header">
    <p>Profile Pengguna </p>
    <u>({{ strtoupper(auth()->user()->status_pendaftaran) }})</u>
    {{-- {{ dd(auth()->user()) }} --}}
  </div>
  <div class="message-body">
    <form action="{{ route('pasien.profile.update') }}" method="post">
      @csrf
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Nama</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" placeholder="Isikan nama" name="name" value="{{ auth()->user()->name }}">
              @if ($errors->has('name'))
                <p class="help is-danger">{{ $errors->first('name') }}</p>
              @endif
            </p>
          </div>
        </div>
      </div>

      @if (auth()->user()->status_pendaftaran == 'santri')
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">NIS</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control">
                <input class="input {{ $errors->has('nis') ? 'is-danger' : '' }}" type="text" placeholder="Isikan NIS" name="nis" value="{{ auth()->user()->nis }}">
                @if ($errors->has('nis'))
                  <p class="help is-danger">{{ $errors->first('nis') }}</p>
                @endif
              </p>
            </div>
          </div>
        </div>
      @else
        <input type="hidden" name="nis" value="">
      @endif

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Email</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" placeholder="Isikan Email" name="email" value="{{ auth()->user()->email }}">
              @if ($errors->has('email'))
                <p class="help is-danger">{{ $errors->first('email') }}</p>
              @endif
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Jenis Kelamin</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control select {{ $errors->has('gender') ? 'is-danger' : '' }}">
              <select name="gender">
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="laki_laki" {{ auth()->user()->gender == "laki_laki" ? "selected" : "" }}>Laki-laki</option>
                  <option value="perempuan" {{ auth()->user()->gender == "perempuan" ? "selected" : "" }}>Perempuan</option>
              </select>
              @if ($errors->has('gender'))
                <p class="help is-danger">{{ $errors->first('gender') }}</p>
              @endif
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">No Telpon</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" type="number" placeholder="Isikan Nomer Telpon Anda" name="phone" value="{{ auth()->user()->phone }}">
              @if ($errors->has('phone'))
                <p class="help is-danger">{{ $errors->first('phone') }}</p>
              @endif
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Alamat</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <textarea class="textarea {{ $errors->has('alamat') ? 'is-danger' : '' }}" rows="2" name="alamat">{{ auth()->user()->address }}</textarea>
              @if ($errors->has('alamat'))
                <p class="help is-danger">{{ $errors->first('alamat') }}</p>
              @endif
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Tanggal Daftar</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input is-static" type="text" value="{{ auth()->user()->created_at }}">
            </p>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column is-3 is-offset-5">
          <button type="sumbit" class="button is-primary" name="button">
            <span class="fas fa-address-book"></span>
            &nbsp;Perbarui Data
          </button>
        </div>
      </div>
    </form>
  </div>
  </article>
@endsection

@section('script_part')
  <script src="{{ asset('plugin/sweetalert/sweetalert.min.js') }}"></script>
  <script>swal({!! Session::get('sweet_alert.alert') !!});</script>
@endsection
