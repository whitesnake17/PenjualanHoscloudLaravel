@extends('layouts.templete')
@section('content')
<title>supplier | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/supplier/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama supplier</label>
                <input type="hidden" name="id" value="{{$supplier->id}}">
                <input type="text" name="nama_supplier" class="form-control" value="{{$supplier->nama_supplier}}">
            </div>
            <div class="form-group">
                <label for="">Alamat supplier</label>
                <input type="hidden" name="id" value="{{$supplier->id}}">
                <input type="text" name="alamat" class="form-control" value="{{$supplier->alamat_supplier}}">
            </div>
            <div class="form-group">
                <label for="">No HP</label>
                <input type="hidden" name="id" value="{{$supplier->id}}">
                <input type="text" name="no_hp" class="form-control" value="{{$supplier->no_hp}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
            <a href="/supplier" class="btn btn-primary ">Kembali</a>        
        </form>
    </div>
</div>


@endsection