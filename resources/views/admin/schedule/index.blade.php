@extends('admin.templates.default');

@section('content')
@include('admin.templates.partials._alert')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:inline">
              Jadwal Dokter
              <a href="{{ route('schedule.create') }}" class="btn bg-purple btn-sm" style="float:right">Tambahkan Jadwal</a>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width:10px">No</th>
              <th>Dokter</th>
              <th>Poli</th>
              <th>Hari</th>
              <th>Jam Mulai</th>
              <th>Jam Selesai</th>
              <th>Action</th>
            </tr>
            @php
                $page = 1;
                if (request()->has('page')) {
                    $page = request('page');
                }
                $no = config('simpuskestren.pagination') * $page - (config('simpuskestren.pagination') - 1);
            @endphp
            @foreach ($schedules as $schedule)
              <tr>
                <td>{{ $no++ }}</td>
                <td>
                  @foreach ($schedule->users as $user)
                    {{ $user->name }}
                  @endforeach
                </td>
                <td>
                  @foreach ($schedule->polies as $poly)
                    {{ $poly->name }}
                  @endforeach
                </td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->time_start }}</td>
                <td>{{ $schedule->time_end }}</td>
                <td>
                  <a href="{{ route('schedule.edit', $schedule) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                  {{-- <a href="{{ route('schedule.destroy', $schedule->id) }}" class="btn btn-danger">Delete</a> --}}
                  <button class="btn btn-danger" id='delete' data-title='{{ $schedule->name }}' href={{ route('schedule.destroy', $schedule) }}> <i class="fa fa-trash"></i> Delete</button>
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
          {{ $schedules->links('vendor.pagination.adminlte') }}
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
          title: 'Delete this '+ title +' schedule',
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
