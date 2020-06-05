@extends('layouts.templete')
@section('content')
<title>pelanggan | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/pelanggan/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama pelanggan</label>
                <input type="hidden" name="id" value="{{$pelanggan->id}}">
                <input type="text" name="nama_pelanggan" class="form-control" value="{{$pelanggan->nama_pelanggan}}">
            </div>
            <div class="form-group">
                <label for="">Alamat pelanggan</label>
                <input type="hidden" name="id" value="{{$pelanggan->id}}">
                <input type="text" name="alamat" class="form-control" value="{{$pelanggan->alamat_pelanggan}}">
            </div>
            <div class="form-group">
                <label for="">No HP</label>
                <input type="hidden" name="id" value="{{$pelanggan->id}}">
                <input type="text" name="no_hp" class="form-control" value="{{$pelanggan->no_hp}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
            <a href="/pelanggan" class="btn btn-primary ">Kembali</a>        
        </form>
    </div>
</div>


@endsection