<body>
    <p>Toko Kasir HosCloud</p>
    <p>Pekanbaru</p>
    <p>Kasir : {{$kasir->name}}</p>
    <p>Tanggal :{{$ambil->tanggal_beli}}</p>
    <p>Pelanggan :{{$pelanggan->nama_pelanggan}}</p>
    <p>===================================</p>
    <table style="margin-top:-10px">
    @foreach($transaksi as $u)
        <tr>
            <td style="padding-right:50px">{{$u->nama_produk}}</td>
            <td style="padding-right:50px">{{$u->jumlah_beli}}</td>
            <td style="padding-right:50px">{{$u->harga}}</td>
         
        </tr>
    @endforeach
        <tr>
            <td colspan="3" style="text-align:right;padding-right:50px">Total Harga</td>
            <td>{{$jumlah}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:right;padding-right:50px">Bayar</td>
            <td>{{$kembalian->bayar}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:right;padding-right:50px">Kembalian</td>
            <td>{{$kembalian->kembali}}</td>
        </tr>
    </table>
    <p>===================================</p>
    <p>Terimakasih Telah berbelanja di tempat kami <br>semoga menyenangkan</p>
</body>
