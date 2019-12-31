@extends('admin.templates.default')

@section('content')
@include('admin.templates.partials._alert')
<div class="col-md-8 col-md-offset-2 ">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">Tambahkan Jadwal Dokter</div>
    </div>
    <form action="{{ route('schedule.store') }}" class="from-horizontal" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Dokter</label>
          <div class="col-md-10">
            <select class="form-control" name="user_id">
                <option value="">Pilih Dokter</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ old('user_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('user_id'))
              <p class="help-block">{{ $errors->first('user_id') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('poly_id') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Poly</label>
          <div class="col-md-10">
            <select class="form-control" name="poly_id">
                <option value="">Pilih Poli</option>
                @foreach ($polies as $poly)
                    <option value="{{ $poly->id }}" {{ old('poly_id') == $poly->id ? 'selected' : '' }}>{{ $poly->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('poly_id'))
              <p class="help-block">{{ $errors->first('poly_id') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('day') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Hari</label>
          <div class="col-md-10">
            <select class="form-control" name="day">
                <option value="">Pilih Hari</option>
                <option value="Ahad" {{ old('day') == 'Ahad' ? 'selected' : '' }}>Ahad</option>
                <option value="Senin" {{ old('day') == 'Senin' ? 'selected' : '' }}>Senin</option>
                <option value="Selasa" {{ old('day') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                <option value="Rabu" {{ old('day') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                <option value="Kamis" {{ old('day') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                <option value="Jumat" {{ old('day') == 'Jumat' ? 'selected' : '' }}>Jum'at</option>
                <option value="Sabtu" {{ old('day') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
            </select>
            @if ($errors->has('day'))
              <p class="help-block">{{ $errors->first('day') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('time_start') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Jam Mulai</label>
          <div class="col-md-10">
            <input type="time" class="form-control" name="time_start">
            @if ($errors->has('time_start'))
              <p class="help-block">{{ $errors->first('time_start') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('time_end') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Jam Selesai</label>
          <div class="col-md-10">
            <input type="time" class="form-control" name="time_end">
            @if ($errors->has('time_end'))
              <p class="help-block">{{ $errors->first('time_end') }}</p>
            @endif
          </div>
        </div>
        <br>

      </div>
      <div class="box-footer">
        <a href="{{ route('schedule.index') }}" class="btn btn-default">Kembali</a>
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
