@extends('admin.templates.default')
@push('select2styles')
  <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endpush
@section('content')
<div class="col-md-10 col-md-offset-1">
  <div class="box">
    <div class="box-header with-border">
      <div class="box-title">Apotek</div>
    </div>
    @foreach ($register->medicalRecords as $val)
      <input type="hidden" name="medical_record_id" value="{{ $val->id }}">
    @endforeach
    <div class="box-body">
      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Nama</label>
        <label for="" class="col-sm-9 control-label">
          {{ $user->name }}
        </label>
      </div>
      <br>
      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="" class="col-sm-3 control-label">Poli Tujuan</label>
        <label for="" class="col-sm-9 control-label">
          Poli {{ $poly->name }}
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
      <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
        <label for="" class="col-sm-3 control-label">Keterangan</label>
        <label for="" class="col-sm-9 control-label">
            {{ $medicalRecord['keterangan'] }}
        </label>
      </div>
      <br>
      <div class="form-group {{ $errors->has('first_diagnosis') ? 'has-error' : '' }}">
        <label for="" class="col-sm-3 control-label">Diagnosa Awal</label>
        <label for="" class="col-sm-9 control-label">
            {{ $medicalRecord['first_diagnosis'] }}
        </label>
      </div>
      <br>
      <div class="form-group {{ $errors->has('first_diagnosis') ? 'has-error' : '' }}">
        <label for="" class="col-sm-3 control-label">Diagnosa Dokter</label>
        <label for="" class="col-sm-9 control-label">
            {{ $medicalRecord['doctor_diagnosis'] }}
        </label>
      </div>
      <br>
      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Obat</label>
        <div class="col-sm-9">
            <table class="table table-bordered" border="1">
                <tr>
                    <td><b>No</b></td>
                    <td><b>Nama Obat / Aturan Pakai</b></td>
                    <td><b>Harga</b></td>
                </tr>
                @php
                  $totalPrice = 0;
                @endphp
                @foreach ($medicineName as $val)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $val['name'] }}</td>
                    <td>{{ format_rupiah($val['price']) }}</td>
                  </tr>
                  @php
                    $totalPrice += $val['price'];
                  @endphp
                @endforeach
                <tr>
                    <td colspan="2"><b>Total</b></td>
                    <td><b>{{ format_rupiah($totalPrice) }}</b></td>
                </tr>
            </table>
        </div>
      </div>
    </div>
    {{-- <form action="{{ route('dokter.data-register.update-dokter') }}" class="from-horizontal" method="post" >
      @csrf --}}
      <div class="box-footer">
        <a href="{{ route('dokter.data-register.index') }}" class="btn btn-default">Cancel</a>
        <button type="button" class="btn bg-purple pull-right" data-name="{{ $user->name }}" data-poly="{{ $poly->name }}" id="selesai">Selesai</button>
      </div>
    {{-- </form> --}}
  </div>
</div>
@endsection
@section('partial_script')
  <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript">
    $('button#selesai').on('click', function(){
        // var href  = $(this).attr('href');
        var user = $(this).attr('data-name');
        var poly = $(this).attr('data-poly');
        console.log(user);
        Swal.fire({
          title: 'Perhatian!',
          text: 'Apakah '+ user +' dari Poli ' + poly + ' Sudah Membayar dan Mendapatkan Obat',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Sudah'
        }).then((result) => {
          if (result.value) {
            $.ajax({
               type: "POST",
               dataType: "HTML",
               // dataType: "JSON",
               url:"{{ route('apotek.update.status') }}",
               data:{ registerId:{{ $register->id }}, status_check:"done", _token: '{{ csrf_token() }}' },
               success:function(data){
                  if (data == 'berhasil') {
                    swal.fire({
                        title: "Berhasil",
                        text: "Pasien Telah Selesai Dilayani",
                        type: "success"
                    }).then(function() {
                        window.location = "{{ route('apotek.data-register.index') }}";
                    });
                  } else {
                    swal("Gagal", "Error 1.1", "error");
                  }
               }
            });
          }
        });
    });
    $(function(){
      $('.select2').select2();
    });
  </script>
@endsection
