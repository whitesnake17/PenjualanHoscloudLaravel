<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ProdukmasukController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $produkmasuk = DB::table('produkmasuk')
                ->join('produk', function($join){
                    $join->on('produkmasuk.kode_produk','=','produk.id_produk');
                })
                ->join('supplier', function($join){
                    $join->on('produkmasuk.id_supplier','=','supplier.id');
                })
                ->join('users', function($join){
                    $join->on('produkmasuk.id_user','=','users.id');
                })
                ->get();

        $produk = DB::table('produk')->get();
        $supplier = DB::table('supplier')->get();
        $user = DB::table('users')->get();
        return view('produkmasuk/index',compact('produkmasuk','produk','supplier'));
    }

    public function store(Request $request)
    {

        for ($a=0; $a < count($request->id_produk); $a++) { 
            
                DB::table('produkmasuk')->insert([
                    'kode_produk' =>  $request->id_produk[$a],
                    'jumlah'=> $request->jumlah[$a],
                    'tanggal_datang'=> $request->tanggal_masuk,
                    'id_user'=> Auth::user()->id,
                    'id_supplier'=>$request->id_supplier
                   
                ]);
        }
        Alert::success('Success', 'Data Telah Terinput');
        return redirect('/produkmasuk');
    }

    public function edit($id)
    {
        $produkmasuk = DB::table('produkmasuk')->where('id_produkmasuk',$id)
            ->join('produk', function($join){
                $join->on('produkmasuk.kode_produk','=','produk.id_produk');
            })
            ->join('supplier', function($join){
                $join->on('produkmasuk.id_supplier','=','supplier.id');
            })
            ->first();
            $produk = DB::table('produk')->get();
        $supplier = DB::table('supplier')->get();
        return view('produkmasuk/edit',compact('produkmasuk','produk','supplier'));
    }

    public function update(Request $request)
    {
        
        $cek1 = DB::table('produkmasuk')->where('id_produkmasuk', $request->id_produkmasuk)->first();
        if ($request->jumlah > $cek1->jumlah) {
            $produk = DB::table('produk')->where('id_produk', $request->id_produk)->first();
            $hitungmasuk = $request->jumlah - $cek1->jumlah;
            $hitung =  $produk->stok + $hitungmasuk;
            DB::table('produk')->where('id_produk', $request->id_produk)->update([
                'stok' => $hitung
            ]);
            if ($produk->stok < $hitungmasuk) {
                return redirect()->back();
            }
        } else {
            $produk = DB::table('produk')->where('id_produk', $request->id_produk)->first();
            $cek1 = DB::table('produkmasuk')->where('id_produkmasuk', $request->id_produkmasuk)->first();
            
            $hitungmasuk2 =  $cek1->jumlah - $request->jumlah;
            $hitung =  $produk->stok - $hitungmasuk2;
            DB::table('produk')->where('id_produk', $request->id_produk)->update([
                'stok' => $hitung
            ]);
        }

        DB::table('produkmasuk')->where('id_produkmasuk',$request->id_produkmasuk)->update([
            'jumlah' => $request->jumlah,
            'tanggal_datang' => $request->tanggal_produkmasuk,
            'id_supplier'=>$request->id_supplier
        ]);
        // alihkan halaman ke halaman pegawai
        Alert::success('Success', 'Data Telah Terupdate');
        return redirect('/produkmasuk');
    }

}
