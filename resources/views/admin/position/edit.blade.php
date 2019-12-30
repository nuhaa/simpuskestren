@extends('admin.templates.default')

@section('content')
<div class="col-md-8 col-md-offset-2 ">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">Edit Master Jabatan</div>
    </div>
    <form action="{{ route('position.update', $position) }}" class="from-horizontal" method="post" >
      @csrf
      @method('PUT')
      <div class="box-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <label for="" class="col-sm-2 control-label">Name</label>
          <div class="col-md-10">
            <input type="text" name="name" class="form-control" value="{{ old('name') ?? $position->name }}" placeholder="Please Fill the Name">
            @if ($errors->has('name'))
              <p class="help-block">{{ $errors->first('name') }}</p>
            @endif
          </div>
        </div>

      </div>
      <div class="box-footer">
        <a href="{{ route('position.index') }}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-info pull-right">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
