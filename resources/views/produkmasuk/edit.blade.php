@extends('layouts.templete')
@section('content')
<title>Produk Masuk | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/produkmasuk/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama produk</label>
                <input type="hidden" name="id_produkmasuk" value={{$produkmasuk->id_produkmasuk}}>
                <input type="hidden" name="id_produk" class="form-control"  value="{{$produkmasuk->kode_produk}}" required>
                <input type="text" name="nama_produk" readonly class="form-control"  value="{{$produkmasuk->nama_produk}}" required>
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="text" name="jumlah" class="form-control"  value="{{$produkmasuk->jumlah}}"  required>
            </div>
            <div class="form-group">
                <label for="">Supllier</label>
                <select name="id_supplier" id="" class="form-control">
                        <option value="" disabled selected>Pilih Supplier</option>
                    @foreach($supplier as $k)
                    @if ($produkmasuk->id_supplier == $k->id)
                        <option value="{{$k->id}}" selected>{{$k->nama_supplier}}</option>
                    @else
                        <option value="{{$k->id}}">{{$k->nama_supplier}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Waktu masuk</label>
                <input type="text" name="tanggal_produkmasuk" class="form-control"  value="{{$produkmasuk->tanggal_datang}}"  required>
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
            <a href="/produkmasuk" class="btn btn-primary ">Kembali</a>
        </form>
    </div>
</div>


@endsection