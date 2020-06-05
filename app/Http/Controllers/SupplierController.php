<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
class SupplierController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supplier= DB::table('supplier')->get();
        return view('supplier/index',compact('supplier'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('supplier')->insert([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        Alert::success('Success', 'Data Telah Terinput');
        return redirect('/supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = DB::table('supplier')->where('id',$id)->first();

        return view('supplier/edit',compact('supplier'));
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
        DB::table('supplier')->where('id',$request->id)->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
       
        Alert::success('Success', 'Data Telah Terupdate');
        return redirect('/supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('supplier')->where('id',$id)->delete();
        Alert::warning('Terhapus', 'Data Berhasil Terhapus');
        return redirect('supplier')->with('update','Data Berhasil Di Hapus');
    }
}
