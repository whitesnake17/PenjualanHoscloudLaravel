@extends('layouts.templete')
@section('content')
<title>Produk | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data produk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
            @endif
            @if( Session::get('update') !="")
            <div class='alert alert-success'><center><b>{{Session::get('update')}}</b></center></div>        
            @endif
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                </div>
                
            </div>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Supplier</th>
                        <th>Harga</th>
                        <th>Opsi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $i => $u)
                    <tr>
                        <td>{{$u->id_produk}}</td>
                        <td>{{$u->nama_produk}}</td>
                        <td>{{$u->nama_kategori}}</td>
                        <td>{{$u->stok}}</td>
                        <td>{{$u->nama_supplier}}</td>
                        <td>{{$u->harga_produk}}</td>
                        <td><a href="/produk/edit/{{$u->id_produk}}" class="btn btn-primary btn-sm ml-2">Edit</a>
                      
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
    <form action="/produk/store" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">kode produk</label>
            <input type="text" name="id_produk" class="form-control"  required>
        </div>
       
        <div class="form-group">
            <label for="">Nama produk</label>
            <input type="text" name="nama_produk" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Kategori</label>
            <select name="kode_kategori" id="" class="form-control">
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach($kategori as $k)
                    <option value="{{$k->kode_kategori}}">{{$k->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Stok</label>
            <input type="text" name="stok" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Harga</label>
            <input type="text" name="harga" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Supplier</label>
            <select name="id_supplier" id="" class="form-control">
                <option value="" disabled selected>Pilih Supplier</option>
                @foreach($supplier as $k)
                    <option value="{{$k->id}}">{{$k->nama_supplier}}</option>
                @endforeach
            </select>
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