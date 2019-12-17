@extends('admin.templates.default')

@section('content')
<div class="col-md-10 col-md-offset-1">
  <div class="box">
    <div class="box-header with-border">
      <div class="box-title">Validasi Pasien</div>
    </div>
    <form action="{{ route('data-register.record', $register->id) }}" class="from-horizontal" method="post" >
      @csrf
      <input type="hidden" name="register_id" value="{{ $register->id }}">
      <input type="hidden" name="poly_id" value="{{ $register->poly_id }}">
      <input type="hidden" name="status_check" value="check_doctor">
      <div class="box-body">
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Nama</label>
          <label for="" class="col-sm-10 control-label">
            @foreach ($register->users as $user)
                {{ $user['name'] }}
            @endforeach
          </label>
        </div>
        <br>
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Poli Tujuan</label>
          <label for="" class="col-sm-10 control-label">
            @foreach ($register->polies as $poli)
                Poli {{ $poli['name'] }}
            @endforeach
          </label>
        </div>
        <br>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Tanggal Periksa</label>
          <label for="" class="col-sm-10 control-label">
            {{ format_hari(\Carbon\Carbon::parse($register->date_check)->format('l')). ", ".
               \Carbon\Carbon::parse($register->date_check)->format('d / M / Y') }}</label>
        </div>
        <br>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Jam Periksa</label>
          <label for="" class="col-md-10 control-label">{{ $register->time_check_start ." - ". $register->time_check_end }}</label>
        </div>
        <br>
        <div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Pilih Dokter</label>
          <div class="col-md-10">
            <select name="doctor_id" class="form-control">
              @foreach ($daftarDokters as $dokter)
                <option value="{{ $dokter['user_id'] }}">
                  @foreach ($dokter['users'] as $dokterName)
                    {{ $dokterName['name'] }}
                  @endforeach
                </option>
              @endforeach
            </select>
            @if ($errors->has('doctor_id'))
              <p class="help-block">{{ $errors->first('doctor_id') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Keterangan</label>
          <div class="col-md-10">
            <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" placeholder="Isikan keterangan periksa">
            @if ($errors->has('keterangan'))
              <p class="help-block">{{ $errors->first('keterangan') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('first_diagnosis') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Diagnosa Awal</label>
          <div class="col-md-10">
              <textarea name="first_diagnosis" rows="2" class="form-control" placeholder="Isikan Diagnosa Awal">{{ old('first_diagnosis') }}</textarea>
              @if ($errors->has('first_diagnosis'))
                <p class="help-block">{{ $errors->first('first_diagnosis') }}</p>
              @endif
          </div>
        </div>
      </div>
      <div class="box-footer">
        <a href="{{ route('data-register.index') }}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn bg-purple pull-right">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
