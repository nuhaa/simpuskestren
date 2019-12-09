@extends('admin.templates.default');

@section('content')
@include('admin.templates.partials._alert')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:inline">
              Hak Akses
              {{-- <a href="{{ route('permission.create') }}" class="btn btn-primary btn-sm" style="float:right">Add Permission</a> --}}
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
            @foreach ($permissions as $permission)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $permission->name }}</td>
                <td>
                  <a href="#!" disabled="" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                  {{-- <a href="{{ route('permission.destroy', $permission->id) }}" class="btn btn-danger">Delete</a> --}}
                  <button class="btn btn-danger" id='delete' disabled="" data-title='{{ $permission->name }}' href={{ route('permission.destroy', $permission) }}> <i class="fa fa-trash"></i> Delete</button>
                  <form action="" method="post" id="deleteForm">
                    @csrf
                    @method("DELETE")
                    <input type="submit" style="display:none" value="">
                  </form>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
        <div class="box-footer clearfix">
          {{ $permissions->links('vendor.pagination.adminlte') }}
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript">
    $('button#delete').on('click', function(){
        var href  = $(this).attr('href');
        var title = $(this).data('title');

        Swal.fire({
          title: 'Delete this '+ title +' permission',
          text: "One deleted, you will not be able to recover this category",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            document.getElementById('deleteForm').action = href;
            document.getElementById('deleteForm').submit();
            Swal.fire(
              'Deleted!',
              'Your Permission has been deleted.',
              'success'
            )
          }
        });
    });
  </script>
@endpush
