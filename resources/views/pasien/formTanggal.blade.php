<div class="columns is-multiline">
  @foreach ($date2 as $key)
  <div class="column is-2">
    <article class="message {{ date('D', strtotime($key['tanggal'])) == 'Sun' ? 'is-danger' : 'is-primary' }}">
      <div class="message-header">
        <p>{{ date('M', strtotime($key['tanggal'])) }}</p>
        <p><b>[{{ $key['jumlah'] }}]</b></p>
        <p>{{ date('Y', strtotime($key['tanggal'])) }}</p>
      </div>
      <div class="message-body">
        <h1 class="is-size-1"><center>{{ date('d', strtotime($key['tanggal'])) }}</center></h1>
        <center>
            <button class="button is-warning check-data" data-tanggal="{{ $key['tanggal'] }}" data-jumlah="{{ $key['jumlah'] }}" data-start-time="{{ $key['jamAkhirStar'] }}" data-end-time="{{ $key['jamAkhirEnd'] }}" data-antrian="{{ $key['noAntrian'] }}">
            <span class="fas fa-calendar-check"></span>
            &nbsp;Ambil Antrian
          </button>
        </center>
      </div>
    </article>
  </div>
  @endforeach
</div>
<script>
$("button.check-data").click(function(){
  var userId = {{ auth()->user()->id }};
  var poliId = {{ $poli }};
  var name = '{{ $name }}';
  var tanggalPeriksa = $(this).attr("data-tanggal");
  var jumlahPeriksa = $(this).attr("data-jumlah");
  var jamAkhirStart = $(this).attr("data-start-time");
  var jamAkhirEnd = $(this).attr("data-end-time");
  var noAntrian = $(this).attr("data-antrian");

  swal({
    title: "Antrian No #"+ noAntrian,
    text: name+"; Tanggal Periksa: "+ tanggalPeriksa+"; Jam Periksa:" + jamAkhirStart + " - " + jamAkhirEnd,
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Konfirmasi",
    cancelButtonText: "Kembali",
    closeOnConfirm: false,
    closeOnCancel: false
  }, function(isConfirm) {
    if (isConfirm) {
      $.ajax({
         type: "POST",
         dataType: "HTML",
         url:"{{ route('pasien.store.antrian') }}",
         data:{ userId:userId, poliId:poliId, tanggalPeriksa:tanggalPeriksa, jamAkhirStart:jamAkhirStart, jamAkhirEnd:jamAkhirEnd, noAntrian:noAntrian, name:name, _token: '{{ csrf_token() }}' },
         success:function(data){
            if (data == 'berhasil') {
              swal({
                  title: "Berhasil",
                  text: "Anda Berhasil Mengambil Nomer Antrian, Silakan Datang Sesuai Jadwal",
                  type: "success"
              }, function() {
                  window.location = "{{ route('pasien.registration') }}";
              });
            } else {
              swal("Gagal", "Anda Hari Ini Telah Terdaftar di "+name, "error");
            }
         }
      });
    } else {
      swal("Kembali", "Anda Kembali ke Halaman Antrian", "error");
    }
  });


});
</script>
