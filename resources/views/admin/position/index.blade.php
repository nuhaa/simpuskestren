@extends('admin.templates.default');
@section('partial_css')
  <link rel="stylesheet" href="{{ asset('admin/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')
@include('admin.templates.partials._alert')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:inline">
              Jabatan
              <a href="{{ route('position.create') }}" class="btn bg-purple btn-sm" style="float:right">Tambahkan Jabatan</a>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered" id="table">
            <thead>
              <tr>
                <th style="width:10px">No</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
        {{-- <div class="box-footer clearfix">
          {{ $positions->links('vendor.pagination.adminlte') }}
        </div> --}}
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script src="{{ asset('admin/js/data-table/jquery.dataTables.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript">
    $(function() {
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("position.data") }}'
            },
            fnCreatedRow: function (row, data, index) {
      			  $('td', row).eq(0).html(index + 1);
      			},
            columns:
            [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name', orderable: true, searchable: true},
              {data: 'action', name: 'action', orderable: false, searchable: false},
              // {data: 'deleted_at', name: 'deleted_at', 'searchable': false},
              // {data: 'edit', name:'edit', 'searchable': false, 'orderable': false}
              // {data: 'name', name: 'name', orderable: false, searchable: false},
            ],
        });
    });

    $('button#delete').on('click', function(){
        var href  = $(this).attr('href');
        var title = $(this).data('title');

        Swal.fire({
          title: 'Delete this '+ title +' position',
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
              'Your Role has been deleted.',
              'success'
            )
          }
        });
    });
  </script>
@endpush
