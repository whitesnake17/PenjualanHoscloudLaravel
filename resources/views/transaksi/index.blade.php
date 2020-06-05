@extends('layouts.templete')
@section('content')
<title>produk | Kasir</title>
<style>
.table {
  border-collapse: collapse;
  width: 100%;
}

.td {
  color:black;
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
</style>
@if( Session::get('gagal') !="")
            <div class='alert alert-danger'><center><b>{{Session::get('gagal')}}</b></center></div>        
            @endif
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
        
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Input Transaksi</h6>
            </div>
            <div class="card-body">
                <form action="/transaksi/detail" method="post">
                @csrf
                    <font color="blue">Kode Transaksi : {{$max_code}}</font>
                    <input type="hidden" name="kode_transaksi" value="{{$max_code}}">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Masukan Kode produk otomatis/Scan Code (contoh 001)</label>
                                <input type="text" id="id_produk" name="id_produk" class="form-control" required>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-4">
                            <label for="">Nama produk</label>
                            <input type="text" id="nama" readonly name="nama_produk"  class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Harga produk</label>
                            <input type="text" id="harga" readonly name="harga" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Jumlah</label>
                            <input type="text" name="jumlah_beli" class="form-control" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <center><input type="submit" class="btn btn-success" value="Submit"></center>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th class="td">produk</th>
                        <th class="td">Jumlah</th>
                        <th class="td">Harga</th>
                        <th class="td">Total</th>
                        <th class="td">Opsi</th>
                    </tr> 
                    @foreach($detail as $u)
                    <tr>
                        <td class="td">{{$u->nama_produk}}</td>
                        <td class="td">{{$u->jumlah_beli}}</td>
                        <td class="td">{{$u->harga}}</td>
                        <td class="td">{{$u->total_harga}}</td>
                        
                        <td><a href="/transaksi/delete/{{ $u->id_keranjang}}" class="delete-confirm btn btn-danger btn-sm ml-2">Hapus</a>
                        </td></tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="td" style="text-align:right">Total Harga : </td>
                        <td class="td">{{$jumlah}}</td>
                        <input type="hidden" name="jumlah" id="jumlah" value="{{$jumlah}}">

                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pembayaran</h6>
            </div>
            <div class="card-body">
                <form action="/transaksi/semua" method="post">
                    @csrf
                    
                    <div class="form-group">
                                <label for="">Nama Pelanggan otomatis (Ajax)</label>
                                <input type="text" id="id_pelanggan" name="id_pelanggan" class="typeahead form-control"  required>
                            </div>

                    <div class="form-group">
                        <label for="">Bayar</label>
                        <input type="hidden" name="kode_transaksi_kembalian" value="{{$max_code}}">
                        <input type="hidden" name="jumlah" id="jumlah" value="{{$jumlah}}">
                        
                        <input type="number" id="bayar" onkeyup="hitung2();" name="bayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kembalian</label>
                        <input type="number" id="kembalian" name="kembalian" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        },
        highlighter: function (item, data) {
            var parts = item.split('#'),
                html = '<div class="row">';
                html += '<div class="col-md-10 pl-0">';
                html += '<span>'+data.name+'</span>';
                html += ', No HP= '+data.no_hp+')';
                html += '</div>';
                html += '</div>';

            return html;
        }
    });
</script>
<script>
$('#id_produk').change(function(){
    setInterval(function(){ 
    if($('#id_produk').val()!=''){
        var id=$('#id_produk').val();
        $.ajax({
           type:"GET",
           url:"{{url('ambil')}}?id_produk="+id,
           success:function(res){               
            if(res){
                $.each(res,function(key,value){
                    $("#harga").val(key);
                    $("#nama").val(value);
                });
            }else{
                $("#harga").empty();
                $("#nama").empty();
            }
           }
        });
    }
}, 500);
});

function hitung2() {
    var a = $("#jumlah").val();
    var b = $("#bayar").val();
    c = b - a; //a kali b
    $("#kembalian").val(c);
}

</script>
@endpush

@endsection

