@extends('layouts.templete')
@section('content')
<title>pelanggan | Kasir</title>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data pelanggan</h6>
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
                       
                        <th width="16px">NO</th>
                        <th>Nama pelanggan</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th width="160px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $i => $u)
                  
                    <tr>
                        
                        <td>{{++$i}}</td>
                        <td>{{$u->nama_pelanggan}}</td>
                        <td>{{$u->alamat_pelanggan}}</td>
                        <td>{{$u->no_hp}}</td>
                        <td>
                            <a href="/pelanggan/edit/{{ $u->id}}" class="btn btn-primary btn-sm ml-2">Edit</a>
                            <a href="/pelanggan/delete/{{ $u->id}}" class="delete-confirm btn btn-danger btn-sm ml-2">Hapus</a>
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
    <form action="/pelanggan/store" method="post">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="">Nama pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">No HP</label>
            <input type="text" name="no_hp" class="form-control"  required>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});

</script>