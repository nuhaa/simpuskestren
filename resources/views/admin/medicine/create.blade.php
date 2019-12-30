@extends('admin.templates.default')

@section('content')
<div class="col-md-8 col-md-offset-2 ">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">Tambahkan Master Obat</div>
    </div>
    <form action="{{ route('medicine.store') }}" class="from-horizontal" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Nama Obat</label>
          <div class="col-md-9">
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Isikan Nama Obat">
            @if ($errors->has('name'))
              <p class="help-block">{{ $errors->first('name') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('aturan_pakai') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Aturan Pakai</label>
          <div class="col-md-9">
            <input type="text" name="aturan_pakai" class="form-control" value="{{ old('aturan_pakai') }}" placeholder="Isikan Aturan Pakai nya, Ex:2x1 Sehari">
            @if ($errors->has('aturan_pakai'))
              <p class="help-block">{{ $errors->first('aturan_pakai') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('sasaran') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Sasaran</label>
          <div class="col-md-9">
            <input type="text" name="sasaran" class="form-control" value="{{ old('sasaran') }}" placeholder="Isikan Sasaran, Ex: Dewasa / Anak">
            @if ($errors->has('sasaran'))
              <p class="help-block">{{ $errors->first('sasaran') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('kegunaan') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Kegunaan</label>
          <div class="col-md-9">
            <textarea name="kegunaan" rows="2" cols="2" class="form-control" placeholder="Isikan Kegunaan Obat">{{ old('kegunaan') }}</textarea>
            @if ($errors->has('kegunaan'))
              <p class="help-block">{{ $errors->first('kegunaan') }}</p>
            @endif
          </div>
        </div>
        <br>
      </div>
      <div class="box-footer">
        <a href="{{ route('medicine.index') }}" class="btn btn-default">Kembali</a>
        <button type="submit" class="btn btn-info pull-right">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
