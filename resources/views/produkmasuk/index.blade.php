@extends('layouts.templete')
@section('content')
<title>produk masuk | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Produk Masuk</h6>
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
                        <th>No</th>
                        <th>Nama produk</th>
                        <th>Jumlah</th>
                        <th>Nama Supplier</th>
                        <th>Penerima</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produkmasuk as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->nama_produk}}</td>
                        <td>{{$u->jumlah}}</td>
                        <td>{{$u->nama_supplier}}</td>
                        <td>{{ $u->name}}</td>
                        <td>{{$u->tanggal_datang}}</td>
                        <td><a href="/produkmasuk/edit/{{ $u->id_produkmasuk}}" class="btn btn-primary btn-sm ml-2">Edit</a></td>
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
        <form action="/produkmasuk/store" method="post">
            @csrf
          <div class="form-group">
             <div class="input_fields_wrap">
            <button class="add_field_button btn btn-primary">Tambah Fields</button>
            <table>
              <tr>
                <td>
                  <label for="">Nama produk</label>
                  <br>
                      <select name="id_produk[]" id="" class="myselect form-control"  required>
                          <option selected disabled value="">Pilih Jenis produk</option>
                          @foreach ($produk as $j)
                          <option value="{{$j->id_produk}}">{{$j->nama_produk}}</option>
                          @endforeach  
                    </select>
                    </div>
                </td>
                <td class="pl-4">
                  <label for="">Jumlah</label>
                <input type="number" name="jumlah[]" class="form-control" required placeholder="Masukan Jumlah" required>
                </td>
              </tr>
            </table>
              
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

            <div class="form-group">
                <label for="">Tanggal masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" required>
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


@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var max_fields      = 100; //maximum input boxes allowed
        var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment


    $(wrapper).append('<div><table><tr><td><select name="id_produk[]" id="" class="myselect form-control" required><option selected disabled value="">Pilih Jenis produk</option>@foreach ($produk as $j)<option value="{{$j->id_produk}}">{{$j->nama_produk}}</option>@endforeach</select></div></td><td class="pl-4"><input type="number" name="jumlah[]" class="form-control" required placeholder="Masukan Jumlah" required></td></tr></table><a href="#" class="remove_field">Remove</a></div>');
    $('.myselect').select2();
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;

    })
    $('.myselect').select2();
});

</script>
@endpush

@endsection