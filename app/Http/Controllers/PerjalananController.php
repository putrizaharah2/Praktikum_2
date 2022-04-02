<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Illuminate\Http\Request;

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->role=='Admin') {
        $data = [
            'title' => 'Catatan Perjalanan',
            'capers' => Perjalanan::get(),
            'route'=> route('perjalanan-create')
        ];
    }else{
        $data = [
            'title' => 'Catatan Perjalanan',
            'capers' => Perjalanan::where('user_id', auth()->user()->id)->orderBy('created_at','desc')->get(),
            'route'=> route('perjalanan-create')
        ];
    }
        return view('admin.perjalanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'form_title'=>'Tambah Perjalanan Baru',
            'method'=> 'POST',
            'route'=>route('perjalanan-store')
        ];
        return view('admin.perjalanan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lokasi'=> 'required',
            'alamat_lokasi'=> 'required',
            'suhu'=> 'required',
        ]);

        $trip = new Perjalanan();
        $user_id= auth()->user()->id;
        $trip ->user_id = $user_id;
        $trip ->lokasi= $request ->lokasi;
        $trip ->alamat_lokasi= $request ->alamat_lokasi;
        $trip ->suhu= $request ->suhu;
        $trip ->save();
        return redirect() -> route('perjalanan-index') ->with('message', 'Catatan Perjalanan berhasil dibuat');
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
        $data=[
            'form_title'=>'Ubah Catatan Perjalanan',
            'method' =>'PUT' ,
            'route'=>route('perjalanan-update', $id) ,
            'caper'=> perjalanan::where('id', $id)->first(),
        ];
        return view('admin.perjalanan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\H ttp\Response
     */
    public function update(Request $request, $id)
    {
        $caper = Perjalanan::find($id);
        $caper->lokasi =$request->lokasi;
        $caper->alamat_lokasi =$request->alamat_lokasi;
        $caper->suhu =$request->suhu;
        $caper->save();
        return redirect()->route('perjalanan-index')->with('success','Catatan Perjalanan berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Perjalanan::find($id);
        $destroy->delete();
        return redirect('/list-perjalanan');
    }
}
