@extends('layouts.app')
{{-- @section('css_partials')

@endsection --}}
@section('content')
  <article class="message is-primary">
  <div class="message-header">
    <p>Profile Pengguna </p>
    <u>({{ strtoupper(auth()->user()->status_pendaftaran) }})</u>
    {{-- {{ dd(auth()->user()) }} --}}
  </div>
  <div class="message-body">
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Nama</label>
      </div>
      <div class="field-body">
        <div class="field">
          <p class="control">
            <input class="input" type="email" placeholder="Recipient email">
          </p>
        </div>
      </div>
    </div>

    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Email</label>
      </div>
      <div class="field-body">
        <div class="field">
          <p class="control">
            <input class="input" type="email" placeholder="Recipient email">
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
            <input class="input" type="email" placeholder="Recipient email">
          </p>
        </div>
      </div>
    </div>

    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Jabatan</label>
      </div>
      <div class="field-body">
        <div class="field">
          <p class="control">
            <input class="input" type="email" placeholder="Recipient email">
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
          <p class="control select">
            <select name="gender">
                <option value="" {{ auth()->user()->gender == null ?? "active" }}>Pilih Jenis Kelamin</option>
                <option value="laki_laki" {{ auth()->user()->gender == "laki_laki" ? "selected" : "" }}>Laki-laki</option>
                <option value="perempuan" {{ auth()->user()->gender == "perempuan" ?? "selected" }}>Perempuan</option>
            </select>
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
            <input class="input" type="number" placeholder="Isikan Nomer Telpon Anda" name="phone" value="{{ auth()->user()->phone }}">
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
          <span class="fas fa-fw"></span>
          Perbarui Data
        </button>
      </div>
    </div>
  </div>
  </article>
@endsection