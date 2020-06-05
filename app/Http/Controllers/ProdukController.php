<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk= DB::table('produk')
                ->join('kategori', function ($join) {
                    $join->on('produk.kode_kategori', '=', 'kategori.kode_kategori');
                })
                ->join('supplier', function ($join) {
                    $join->on('produk.id_supplier', '=', 'supplier.id');
                })
                ->get();

        $kategori = DB::table('kategori')->get();
        $supplier = DB::table('supplier')->get();
        return view('produk/index',compact('produk','kategori','supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = DB::table('produk')->where('id_produk',$request->id)->count();
        if($cek == 1){
            return redirect()->back();
        }
        else
        {
            DB::table('produk')->insert([
                'id_produk' => $request->id_produk,
                'nama_produk' => $request->nama_produk,
                'stok' => $request->stok,
                'harga_produk' => $request->harga,
                'kode_kategori' => $request->kode_kategori,
                'id_supplier' => $request->id_supplier,
        ]);
        Alert::success('Success', 'Data Telah Terinput');
        return redirect('/produk');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $produk= DB::table('produk')->where('id_produk',$id)
                ->join('kategori', function ($join) {
                    $join->on('produk.kode_kategori', '=', 'kategori.kode_kategori');
                })
                ->join('supplier', function ($join) {
                    $join->on('produk.id_supplier', '=', 'supplier.id');
                })
                ->first();

        $kategori = DB::table('kategori')->get();
        $supplier = DB::table('supplier')->get();
        return view('produk/edit',compact('produk','kategori','supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('produk')->where('id_produk',$request->id_produk)->update([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga,
            'kode_kategori' => $request->kode_kategori,
            'stok' => $request->stok,
            'id_supplier' => $request->id_supplier,
        ]);
        Alert::success('Success', 'Data Telah Terupdate');
        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produk')->where('id_produk',$id)->delete();
        Alert::warning('Terhapus', 'Data Berhasil Terhapus');
        return redirect('kategori');
    }
}
