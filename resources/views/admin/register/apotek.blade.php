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
    <input type="hidden" name="register_id" value="{{ $register->id }}">
    <input type="hidden" name="status_check" value="medicine">
    <div class="box-body">
      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Nama</label>
        <label for="" class="col-sm-9 control-label">
          @foreach ($register->users as $user)
              {{ $user['name'] }}
          @endforeach
        </label>
      </div>
      <br>
      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="" class="col-sm-3 control-label">Poli Tujuan</label>
        <label for="" class="col-sm-9 control-label">
          @foreach ($register->polies as $poli)
              Poli {{ $poli['name'] }}
          @endforeach
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
        <button type="button" class="btn bg-purple pull-right" id="selesai">Selesai</button>
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
    $(function(){
      $('.select2').select2();
    });
  </script>
@endsection
