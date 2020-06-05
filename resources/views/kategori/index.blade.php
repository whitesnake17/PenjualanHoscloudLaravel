@extends('layouts.templete')
@section('content')
<title>Kategori | Kasir</title>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
            @endif
            @if( Session::get('update') !="")
            <div class='alert alert-success'><center><b>{{Session::get('update')}}</b></center></div>        
            @endif
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                       
                        <th width="16px">ID</th>
                        <th>Nama Kategori</th>
                        <th width="160px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $i => $u)
                    <tr>
                        
                        <td>{{$u->kode_kategori}}</td>
                        <td>{{$u->nama_kategori}}</td>
                        <td>
                            <a href="/kategori/edit/{{ $u->kode_kategori}}" class="btn btn-primary btn-sm ml-2">Edit</a>
                            <a href="/kategori/delete/{{ $u->kode_kategori}}" class="btn btn-danger btn-sm ml-2">Hapus</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Masukan Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="/kategori/store" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Kode Kategori</label>
            <input type="text" name="kode_kategori" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control"  required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
    </div>
</div>
</div>
@endsection