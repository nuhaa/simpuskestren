@extends('admin.templates.default');

@section('content')
@include('admin.templates.partials._alert')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:inline">
              Poli
              <a href="{{ route('poly.create') }}" class="btn bg-purple btn-sm" style="float:right">Tambahkan Poli</a>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width:10px">No</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
            @php
                $page = 1;
                if (request()->has('page')) {
                    $page = request('page');
                }
                $no = config('simpuskestren.pagination') * $page - (config('simpuskestren.pagination') - 1);
            @endphp
            @foreach ($polies as $poly)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $poly->name }}</td>
                <td>
                  <a href="{{ route('poly.edit', $poly) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                  {{-- <a href="{{ route('poly.destroy', $poly->id) }}" class="btn btn-danger">Delete</a> --}}
                  {{-- <button class="btn btn-danger" id='delete' data-title='{{ $poly->name }}' href={{ route('poly.destroy', $poly) }}> <i class="fa fa-trash"></i> Delete</button>
                  <form action="" method="post" id="deleteForm">
                    @csrf
                    @method("DELETE")
                    <input type="submit" style="display:none" value="">
                  </form> --}}
                </td>
              </tr>
            @endforeach
          </table>
        </div>
        <div class="box-footer clearfix">
          {{ $polies->links('vendor.pagination.adminlte') }}
        </div>
      </div>
    </div>
  </div>
@endsection
