<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'title'=>'Masyarakat List',
            'masyarakats'=> Masyarakat::all(),
            // 'route'=>route('masyarakat.create'),
        ];
        return view('admin.masyarakat.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'form_title'=>'Add New Masyarakat',
            'method'=> 'POST',
            // 'route'=>route('masyarakat-store')

        ];
        return view('admin.masyarakat.create', $data);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masyarakat = new Masyarakat();
        $masyarakat ->nik= $request ->nik;
        $masyarakat ->nama= $request ->nama;
        $masyarakat ->tanggallahir= $request ->tanggallahir;
        $masyarakat ->alamat= $request ->alamat;
        $masyarakat ->gmail= $request ->gmail;
        $masyarakat ->telpon= $request ->telpon;
        $masyarakat ->save();
        //return view('admin.masyarakat.index');
        return redirect() -> route('masyarakat-index');

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
            'form_title'=>'Edit List',
            'method' =>'PUT' ,
            'route'=>route('masyarakat-update', $id) ,
            'article'=> Masyarakat::where('id', $id)->first(),
            //haloo

        ];
        return view('admin.masyarakat.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Masyarakat::find($id);
        $destroy->delete();
        return redirect('/list-masyarakat');
    }
}
