@extends('admin.templates.default')

@section('content')
<div class="col-md-8 col-md-offset-2 ">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">Tambah Pengguna</div>
    </div>
    {{-- {{ dd($errors) }} --}}
    <form action="{{ route('user.store') }}" class="from-horizontal" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Name</label>
          <div class="col-md-9">
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Isikan Nama Lengkap">
            @if ($errors->has('name'))
              <p class="help-block">{{ $errors->first('name') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('nis') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Nomer Induk Santri</label>
          <div class="col-md-9">
            <input type="text" name="nis" class="form-control" value="{{ old('nis') }}" placeholder="Isikan Nomor Induk Santri (Khusus Untuk Santri)">
            @if ($errors->has('nis'))
              <p class="help-block">{{ $errors->first('nis') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Email</label>
          <div class="col-md-9">
            <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Isikan Email">
            @if ($errors->has('email'))
              <p class="help-block">{{ $errors->first('email') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Password</label>
          <div class="col-md-9">
            <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Isikan password (minimal 8 karakter)">
            @if ($errors->has('password'))
              <p class="help-block">{{ $errors->first('password') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Alamat</label>
          <div class="col-md-9">
            <textarea name="address" rows="2" class="form-control" placeholder="Isikan Alamat Pengguna">{{ old('address') }}</textarea>
            @if ($errors->has('address'))
              <p class="help-block">{{ $errors->first('address') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Nomor Telepon</label>
          <div class="col-md-9">
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Isikan Nomor Telepon">
            @if ($errors->has('phone'))
              <p class="help-block">{{ $errors->first('phone') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('jabatan') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Jabatan</label>
          <div class="col-md-9">
            <select name="jabatan" class="form-control">
                <option value="">Pilih Jabatan (Khusus Pegawai)</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->name }}" {{ old('jabatan') == $position->name ? 'selected' : '' }}>{{ $position->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('jabatan'))
              <p class="help-block">{{ $errors->first('jabatan') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Jenis Kelamin</label>
          <div class="col-md-9">
            <select name="gender" class="form-control">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="laki_laki" {{ old('gender') == 'laki_laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @if ($errors->has('gender'))
              <p class="help-block">{{ $errors->first('gender') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('status_pendaftaran') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Status Pengguna</label>
          <div class="col-md-9">
            <select name="status_pendaftaran" class="form-control">
                <option value="">Pilih Status Pendaftaran</option>
                <option value="umum" {{ old('status_pendaftaran') == 'umum' ? 'selected' : '' }}>Umum</option>
                <option value="santri" {{ old('status_pendaftaran') == 'santri' ? 'selected' : '' }}>Santri</option>
                <option value="pegawai" {{ old('status_pendaftaran') == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
            </select>
            @if ($errors->has('status_pendaftaran'))
              <p class="help-block">{{ $errors->first('status_pendaftaran') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Level Pengguna</label>
          <div class="col-md-9">
            <select name="role_id" class="form-control">
              <option value="">Pilih Level</option>
              @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('role_id'))
              <p class="help-block">{{ $errors->first('role_id') }}</p>
            @endif
          </div>
        </div>
        <br>
      </div>
      <div class="box-footer">
        <a href="{{ route('user.index') }}" class="btn btn-default">Kembali</a>
        <button type="submit" class="btn btn-info pull-right">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('select2styles')
<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  $(function(){
    $('.select2').select2();
  });
</script>
@endpush
