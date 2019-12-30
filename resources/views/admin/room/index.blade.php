@extends('admin.templates.default');

@section('content')
@include('admin.templates.partials._alert')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:inline">
              Data Ruang
              <a href="{{ route('room.create') }}" class="btn bg-purple btn-sm" style="float:right">Tambahkan Ruang</a>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width:10px">No</th>
              <th>Ruang</th>
              <th>Action</th>
            </tr>
            @php
                $page = 1;
                if (request()->has('page')) {
                    $page = request('page');
                }
                $no = config('simpuskestren.pagination') * $page - (config('simpuskestren.pagination') - 1);
            @endphp
            @foreach ($rooms as $room)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $room->name }}</td>
                <td>
                  <a href="{{ route('room.edit', $room) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                  {{-- <a href="{{ route('room.destroy', $room->id) }}" class="btn btn-danger">Delete</a> --}}
                  {{-- <button class="btn btn-danger" id='delete' data-title='{{ $room->name }}' href={{ route('room.destroy', $room) }}> <i class="fa fa-trash"></i> Delete</button>
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
          {{ $rooms->links('vendor.pagination.adminlte') }}
        </div>
      </div>
    </div>
  </div>
@endsection
