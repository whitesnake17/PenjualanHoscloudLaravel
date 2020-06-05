<?php

namespace App\Http\Controllers;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class PelangganController extends Controller
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

        $pelanggan= DB::table('pelanggan')->get();
        return view('pelanggan/index',compact('pelanggan'));;
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
        DB::table('pelanggan')->insert([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat_pelanggan' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        
        Alert::success('Success', 'Data Telah Terinput');
        return redirect('/pelanggan');
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
        $pelanggan = DB::table('pelanggan')->where('id',$id)->first();

        return view('pelanggan/edit',compact('pelanggan'));
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
        DB::table('pelanggan')->where('id',$request->id)->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat_pelanggan' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        Alert::success('Success', 'Data Telah Terupdate');
        return redirect('pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
  
        DB::table('pelanggan')->where('id',$id)->delete();
        Alert::warning('Terhapus', 'Data Berhasil Terhapus');

        return redirect('pelanggan');
    }
}
