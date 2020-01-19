<form action="{{ route('medicine.search') }}" method="post">
    @csrf
    <div class="callout callout-warning">
    <div class="row">
      <div class="col-md-5">
        <input type="text" name="name" class="form-control" value="{{ request()->input('name') }}" placeholder="cari nama obat">
      </div>
      <div class="col-md-5">
        <input type="text" name="kegunaan" class="form-control" value="{{ request()->input('kegunaan') }}" placeholder="cari kegunaan obat">
      </div>
      <div class="col-md-1">
        <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" style="margin-top:-3px;padding-right:-2px"><i class="fa fa-search"></i> </button>
      </div>
      <div class="col-md-1">
        {{-- {{ dd() }} --}}
        @foreach (auth()->user()->roles as $key)
        <a href="../{{ $key['name'] }}/medicine" class="btn btn-danger btn-lg btn-block" style="margin-top:-3px"> <i class="fa fa-refresh"></i></a>
        @endforeach
      </div>
    </div>
    </div>
</form>
