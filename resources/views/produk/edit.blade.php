@extends('layouts.templete')
@section('content')
<title>Produk | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/produk/update" method="post">
            @csrf
           <div class="form-group">
                <label for="">Nama Produk</label>
                <input type="hidden" name="id_produk" class="form-control" value="{{$produk->id_produk}}" required>
                <input type="text" name="nama_produk" class="form-control" value="{{$produk->nama_produk}}" required>
            </div>
            <div class="form-group">
                <label for="">Stok</label>
                <input type="text" name="stok" class="form-control"  value="{{$produk->stok}}" required>
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <select name="kode_kategori" id="" class="form-control">
                        <option value="" disabled selected>Pilih Kategori</option>
                    @foreach($kategori as $k)
                    @if ($produk->kode_kategori == $k->kode_kategori)
                        <option value="{{$k->kode_kategori}}" selected>{{$k->nama_kategori}}</option>
                    @else
                        <option value="{{$k->kode_kategori}}">{{$k->nama_kategori}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" class="form-control"  value="{{$produk->harga_produk}}"  required>
            </div>

            <div class="form-group">
                <label for="">Supllier</label>
                <select name="id_supplier" id="" class="form-control">
                        <option value="" disabled selected>Pilih Supplier</option>
                    @foreach($supplier as $k)
                    @if ($produk->id_supplier == $k->id)
                        <option value="{{$k->id}}" selected>{{$k->nama_supplier}}</option>
                    @else
                        <option value="{{$k->id}}">{{$k->nama_supplier}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
            <a href="/produk" class="btn btn-primary ">Kembali</a>
        </form>
    </div>
</div>


@endsection