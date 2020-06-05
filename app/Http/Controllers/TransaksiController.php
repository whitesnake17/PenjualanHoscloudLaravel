<?php

namespace App\Http\Controllers;
use App\Pelanggan;
use Illuminate\Http\Request;
use DB;
use PhpParser\Node\Stmt\Echo_;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
class TransaksiController extends Controller{


    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function autocomplete(Request $request)
    {
        $data = Pelanggan::select("id","nama_pelanggan as name","alamat_pelanggan","no_hp")->where("nama_pelanggan","LIKE","%{$request->input('query')}%")->get();

        return response()->json($data);
    }
    public function ambil(Request $request)
    {
        $barang = DB::table("produk")
        ->where("id_produk",$request->id_produk)
        ->pluck("nama_produk","harga_produk");
        return response()->json($barang);
    }

    public function index()
    {
        $max = DB::table('transaksi')->where('kode_transaksi', \DB::raw("(select max(`kode_transaksi`) from transaksi)"))->pluck('kode_transaksi');
        $check_max = DB::table('transaksi')->count();
        if($check_max == null){
            $max_code = "T0001";
        }else{
            $max_code = $max[0];
            $max_code++;
        }
        $kategori = DB::table('kategori')->get();
        $detail = DB::table('keranjang')
                    ->join('produk',function($join){
                        $join->on('keranjang.id_produk','=','produk.id_produk');
                    })
                    ->get();

        $jumlah = DB::table('keranjang')
                ->join('produk',function($join){
                    $join->on('keranjang.id_produk','=','produk.id_produk');
                })->sum('total_harga');
        $pelanggan = DB::table('pelanggan')->get();
        return view('transaksi/index',compact('kategori','max_code','detail','jumlah'));
    }
    public function store(Request $request)
    {
        
        $cek = DB::table('produk')->where('id_produk',$request->id_produk)->first();
        if ($cek->stok < $request->jumlah_beli) {
            return redirect()->back();
        }

        $hitung = $request->harga * $request->jumlah_beli;
        $tanggal = date('Y-m-d');

        DB::table('keranjang')->insert([
            'kode_transaksi'=>$request->kode_transaksi,
            'id_produk'=>$request->id_produk,
            'jumlah_beli'=>$request->jumlah_beli,
            'total_harga'=>$hitung,
            'harga'=>$request->harga            
        ]);
       
       
        return redirect()->back();
    }
    public function storesurya(Request $request)
    {
        $apaaja = $request->id_pelanggan;
        
        $data = DB::table('pelanggan')
        ->where("nama_pelanggan","=", $apaaja)->get();
       
    
        $tanggal = date('Y-m-d');
        if($request->kembalian < 0){
            return redirect()->back()->with('gagal','Bayaran Kurang');
        }
        foreach ($data as $s) {
        DB::table('transaksi')->insert([
            'kode_transaksi'=>$request->kode_transaksi_kembalian,
            'total'=>$request->jumlah,
            'bayar'=>$request->bayar,
            'kembali'=>$request->kembalian,
            'tanggal_beli'=>$tanggal,
            'id_pelanggan'=>$s->id,
            'id_user'=>Auth::user()->id

        ]);
        }

        $select = DB::table('keranjang')->get();
        $hitung = $request->harga * $request->jumlah_beli;
        foreach ($select as $s) {
            DB::table('transaksi_detail')->insert([
                'kode_transaksi'=>$s->kode_transaksi,
            'id_produk'=>$s->id_produk,
            'jumlah_beli'=>$s->jumlah_beli,
           
            'harga'=>$s->harga    
                       
            ]);
        }

        foreach ($select as $s) {
            DB::table('keranjang')->truncate([
                'kode_transaksi'=>$s->kode_transaksi,
            'id_produk'=>$s->id_produk,
            'jumlah_beli'=>$s->jumlah_beli,
            'total_harga'=>$hitung,
            'harga'=>$s->harga      
            ]);
        }
        $select = DB::table('transaksi_detail')->get();

        
        $transaksi =DB::table('transaksi_detail')->where('kode_transaksi',$request->kode_transaksi_kembalian)
                ->join('produk',function($join){
                    $join->on('transaksi_detail.id_produk','=','produk.id_produk');
                })->get();
        $ambil =DB::table('transaksi')->where('kode_transaksi',$request->kode_transaksi_kembalian)->first();
        $jumlah =  DB::table('transaksi')->where('kode_transaksi',$request->kode_transaksi_kembalian)
                    ->sum('total');
        $kasir = DB::table('transaksi')->where('kode_transaksi',$request->kode_transaksi_kembalian)
                ->join('users',function($join){
                    $join->on('transaksi.id_user','=','users.id');
                })->first();
                $pelanggan = DB::table('transaksi')->where('kode_transaksi',$request->kode_transaksi_kembalian)
                ->join('pelanggan',function($join){
                    $join->on('transaksi.id_pelanggan','=','pelanggan.id');
                })->first();
        $kembalian=DB::table('transaksi')->where('kode_transaksi',$request->kode_transaksi_kembalian)->first();

        return view('transaksi/detail',compact('transaksi','kembalian','ambil','jumlah','kasir','pelanggan'));
    }


    public function cetak($id){

        $transaksi =DB::table('transaksi_detail')->where('kode_transaksi',$id)
                ->join('produk',function($join){
                    $join->on('transaksi_detail.id_produk','=','produk.id_produk');
                })->get();
        $ambil =DB::table('transaksi')->where('kode_transaksi',$id)->first();
        $jumlah =  DB::table('transaksi')->where('kode_transaksi',$id)
                    ->sum('total');
        $kasir = DB::table('transaksi')->where('kode_transaksi',$id)
                ->join('users',function($join){
                    $join->on('transaksi.id_user','=','users.id');
                })->first();
                $pelanggan = DB::table('transaksi')->where('kode_transaksi',$id)
                ->join('pelanggan',function($join){
                    $join->on('transaksi.id_pelanggan','=','pelanggan.id');
                })->first();
        $kembalian=DB::table('transaksi')->where('kode_transaksi',$id)->first();
        return view('transaksi/struk',compact('transaksi','kembalian','ambil','jumlah','kasir','pelanggan'));
    }

    public function destroy($id)
    {
        DB::table('keranjang')->where('id_keranjang',$id)->delete();
        Alert::warning('Terhapus', 'Data Berhasil Terhapus');
        return redirect('transaksi');
    }
}
