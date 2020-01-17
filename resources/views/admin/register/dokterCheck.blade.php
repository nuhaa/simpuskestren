@extends('admin.templates.default')
@push('select2styles')
  <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endpush
@section('content')
<div class="col-md-10 col-md-offset-1">
  <div class="box">
    <div class="box-header with-border">
      <div class="box-title">Periksa Dokter</div>
    </div>
    <form action="{{ route('dokter.data-register.update-dokter') }}" class="from-horizontal" method="post" >
      @csrf
      @foreach ($register->medicalRecords as $val)
        <input type="hidden" name="medical_record_id" value="{{ $val->id }}">
      @endforeach
      <input type="hidden" name="register_id" value="{{ $register->id }}">
      <input type="hidden" name="status_check" value="medicine">
      <div class="box-body">
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Nama</label>
          <label for="" class="col-sm-9 control-label">
            @foreach ($register->users as $user)
                {{ $user['name'] }}
            @endforeach
          </label>
        </div>
        <br>
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Poli Tujuan</label>
          <label for="" class="col-sm-9 control-label">
            @foreach ($register->polies as $poli)
                Poli {{ $poli['name'] }}
            @endforeach
          </label>
        </div>
        <br>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Tanggal Periksa</label>
          <label for="" class="col-sm-9 control-label">
            {{ format_hari(\Carbon\Carbon::parse($register->date_check)->format('l')). ", ".
               \Carbon\Carbon::parse($register->date_check)->format('d / M / Y') }}</label>
        </div>
        <br>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Jam Periksa</label>
          <label for="" class="col-md-9 control-label">{{ $register->time_check_start ." - ". $register->time_check_end }}</label>
        </div>
        <br>
        @foreach ($register->medicalRecords as $val)
        <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Keterangan</label>
          <label for="" class="col-sm-9 control-label">
              {{ $val['keterangan'] }}
          </label>
        </div>
        <br>
        <div class="form-group {{ $errors->has('first_diagnosis') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Diagnosa Awal</label>
          <label for="" class="col-sm-9 control-label">
              {{ $val['first_diagnosis'] }}
          </label>
        </div>
        @endforeach
        <br>
        <div class="form-group {{ $errors->has('doctor_diagnosis') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Diagnosa Dokter</label>
          <div class="col-md-9">
              <textarea name="doctor_diagnosis" rows="2" class="form-control" placeholder="Isikan Diagnosa Dokter">{{ old('doctor_diagnosis') }}</textarea>
              @if ($errors->has('doctor_diagnosis'))
                <p class="help-block">{{ $errors->first('doctor_diagnosis') }}</p>
              @endif
          </div>
        </div>
        <br><br>
        <div class="form-group {{ $errors->has('list_medicines') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Obat</label>
          <div class="col-md-9">
            <select class="form-control select2" name="list_medicines[]" multiple="multiple">
              @foreach ($medicines as $medicine)
                 <option value="{{ $medicine->id }}">
                    {{ $medicine->medicines->name }}
                 </option>
              @endforeach
            </select>
            @if ($errors->has('list_medicines'))
              <p class="help-block">{{ $errors->first('list_medicines') }}</p>
            @endif
          </div>
        </div>
      </div>
      <div class="box-footer">
        <a href="{{ route('dokter.data-register.index') }}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn bg-purple pull-right">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
@section('partial_script')
  <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
  <script>
    $(function(){
      $('.select2').select2();
    });
  </script>
@endsection
