<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $stok =  DB::table('produk')->sum('stok');
        $produkmasuk =  DB::table('produkmasuk')->sum('jumlah');
        $jumlah_kasir =  DB::table('users')->count();
        $jumlah_transaksi =  DB::table('transaksi')->sum('total');
        
                    
        return view('home',compact('stok','produkmasuk','jumlah_transaksi','jumlah_kasir'));
    }
}
