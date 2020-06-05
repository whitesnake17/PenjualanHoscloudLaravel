@extends('layouts.templete')
@section('content')
<title>Kategori | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/kategori/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="hidden" name="kode_kategori" value="{{$kategori->kode_kategori}}">
                <input type="text" name="nama_kategori" class="form-control" value="{{$kategori->nama_kategori}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
            <a href="/pelanggan" class="btn btn-primary ">Kembali</a>  
        </form>
    </div>
</div>


@endsection