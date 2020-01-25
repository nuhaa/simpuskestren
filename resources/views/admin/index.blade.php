@extends('admin.templates.default')

@section('partial_css')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Dashboard</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
                <h4><center><b>Jumlah Pasien</b></center></h4>
            </div>
            <div class="col-md-12">
              {!! $pasien->container() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('partial_script')
  {!! $pasien->script() !!}
@endsection
