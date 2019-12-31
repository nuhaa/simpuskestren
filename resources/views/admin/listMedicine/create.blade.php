@extends('admin.templates.default')

@section('content')
<div class="col-md-8 col-md-offset-2 ">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">Tambahkan Obat</div>
    </div>
    <form action="{{ route('listmedicine.store') }}" class="from-horizontal" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group {{ $errors->has('medicine_id') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Nama Obat</label>
          <div class="col-md-9">
            <select name="medicine_id" class="form-control">
                <option value="">Pilih Obat</option>
                @foreach ($medicines as $medicine)
                    <option value="{{ $medicine->id }}" {{ old('medicine_id') == $medicine->id ? 'selected' : '' }}>{{ $medicine->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('medicine_id'))
              <p class="help-block">{{ $errors->first('medicine_id') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Stock</label>
          <div class="col-md-9">
            <input type="text" name="stock" value="{{ old('stock') }}" class="form-control">
            @if ($errors->has('stock'))
              <p class="help-block">{{ $errors->first('stock') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Harga Satuan</label>
          <div class="col-md-9">
            <input type="text" name="price" value="{{ old('price') }}" class="form-control">
            @if ($errors->has('price'))
              <p class="help-block">{{ $errors->first('price') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('information') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Info Tambahan</label>
          <div class="col-md-9">
            <input type="text" name="information" value="{{ old('information') }}" class="form-control">
            @if ($errors->has('information'))
              <p class="help-block">{{ $errors->first('information') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('date_buy') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Tanggal Beli</label>
          <div class="col-md-9">
            <input type="date" name="date_buy" value="{{ old('date_buy') }}" class="form-control">
            @if ($errors->has('date_buy'))
              <p class="help-block">{{ $errors->first('date_buy') }}</p>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group {{ $errors->has('date_expired') ? 'has-error' : '' }}">
          <label for="" class="col-sm-3 control-label">Tanggal Kadaluarsa</label>
          <div class="col-md-9">
            <input type="date" name="date_expired" value="{{ old('date_expired') }}" class="form-control">
            @if ($errors->has('date_expired'))
              <p class="help-block">{{ $errors->first('date_expired') }}</p>
            @endif
          </div>
        </div>
        <br>
      </div>
      <div class="box-footer">
        <a href="{{ route('listmedicine.index') }}" class="btn btn-default">Kembali</a>
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
