@extends('admin.templates.default');
@section('partial_css')
    <link href="{{ asset('plugin/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('content')
  @include('admin.templates.partials._alert')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" style="display:inline">
              Data Pendaftar
              {{-- <a href="{{ route('data-register.create') }}" class="btn bg-purple btn-sm" style="float:right">Tambahkan Obat</a> --}}
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Poli</th>
                <th>No Antrian</th>
                <th>Tanggal Periksa</th>
                <th>Jam Periksa</th>
                <th>Status Periksa</th>
                <th>Action</th>
              </tr>
            </thead>
            @php
                $page = 1;
                if (request()->has('page')) {
                    $page = request('page');
                }
                $no = config('simpuskestren.pagination') * $page - (config('simpuskestren.pagination') - 1);
            @endphp
            <tbody>
            @foreach ($datas as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  @foreach ($data['users'] as $user)
                    {{ $user['name'] }}
                  @endforeach
                </td>
                <td>
                  @foreach ($data['polies'] as $poli)
                    {{ $poli['name'] }}
                  @endforeach
                </td>
                <td>{{ $data->no_antrian }}</td>
                <td>{{ date('d-m-Y', strtotime($data['date_check'])) }}</td>
                <td>{{ $data['time_check_start']." - ". $data['time_check_end'] }}</td>
                <td>
                  @php
                      $cekTanggal = strtotime($data['date_check']);
                      $cekJam = strtotime($data['time_check_end']);
                      $cekTanggalNow = strtotime(date('m-d-Y'));
                      $cekJamNow = strtotime(date('h:i:s'));
                      $cek = $cekTanggal+$cekJam;
                      $cekNow = $cekTanggalNow+$cekJamNow;
                  @endphp
                  <span class="label {{ (($cekNow > $cek) and ($data['status_check'] == 'register')) ? 'label-danger' : ($data['status_check'] == 'register' ? 'label-warning' : 'label-primary') }}">
                    {{ (($cekNow > $cek) and ($data['status_check'] == 'register')) ? 'Kadaluarsa' : $data['status_check'] }}
                  </span>
                </td>
                <td>
                  @if ($data['status_check'] == 'register')
                    {{-- <form action="{{ route('data-register.update.status') }}" method="post">
                      @csrf --}}
                      <button class="btn btn-warning cek" data-id="{{ $data['id'] }}" data-no-antrian="{{ $data->no_antrian }}" > <i class="fa fa-check-square"></i> Validasi</button>
                    {{-- </form> --}}
                  @elseif ($data['status_check'] == 'verified')
                    <a href="{{ route('data-register.edit', $data) }}" class="btn btn-warning"><i class="fa fa-check-square"></i> Diagnosa</a>
                  @elseif ($data['status_check'] == 'un_verified')
                    <button class="btn btn-danger">Tidak Ada</button>
                  @elseif ($data['status_check'] == 'diagnosis')
                    <button class="btn btn-danger">Diagnosa</button>
                  @elseif ($data['status_check'] == 'check_doctor')
                    <button class="btn btn-warning">Cek Dokter</button>
                  @elseif ($data['status_check'] == 'medicine')
                    <button class="btn btn-warning">Apotek</button>
                  @elseif ($data['status_check'] == 'done')
                    <button class="btn btn-success">Selesai</button>
                  @endif
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="box-footer clearfix">
          {{-- {{ $datas->links('vendor.pagination.adminlte') }} --}}
        </div>
      </div>
    </div>
  </div>
@endsection
@section('partial_script')
  <script src="{{ asset('plugin/sweetalert/sweetalert.min.js') }}"></script>
  <script type="text/javascript">
    $('button.cek').on('click', function(){
        var id = $(this).attr('data-id');
        var noAntrian = $(this).attr('data-no-antrian');
        swal({
          title: "Apakah No Antrian "+ noAntrian + " Hadir",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Hadir",
          cancelButtonText: "Tidak",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {
            $.ajax({
               type: "POST",
               dataType: "HTML",
               url:"{{ route('data-register.update.status') }}",
               data:{ id:id, message:"verified", _token:'{{ csrf_token() }}' },
               success:function(data){
                  if (data == 'berhasil') {
                    swal({
                        title: "Berhasil",
                        text: "Anda Memvalidasi Kehadiran Pasien",
                        type: "success"
                    }, function() {
                        window.location = "{{ route('data-register.index') }}";
                    });
                  } else {
                    swal("Gagal", "Pasien Gagal Divalidasi (Error 0.1)", "error");
                  }
               }
            });
          } else {
            $.ajax({
               type: "POST",
               dataType: "HTML",
               url:"{{ route('data-register.update.status') }}",
               data:{ id:id, message:"un_verified", _token:'{{ csrf_token() }}' },
               success:function(data){
                  if (data == 'berhasil') {
                    swal({
                        title: "Berhasil",
                        text: "Anda Memvalidasi Ketidakhadiran Pasien",
                        type: "success"
                    }, function() {
                        window.location = "{{ route('data-register.index') }}";
                    });
                  } else {
                    swal("Gagal", "Pasien Gagal Divalidasi (Error 0.1)", "error");
                  }
               }
            });
          }
        });
    });
  </script>
@endsection