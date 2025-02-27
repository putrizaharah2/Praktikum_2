<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'title'=>'Daftar Pengguna',
            'masyarakats'=> User::where('role','User')->get(),
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
        //

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
            'form_title'=>'Ubah Data Pengguna',
            'method' =>'PUT' ,
            'route'=>route('user-update', $id) ,
            'user'=> user::where('id', $id)->first(),
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
        $pro = User::find($id);
        if ($request ->hasFile ('photo')){
            $picture =$request ->file ('photo');
            $name =$pro ->name.'-'. $pro ->id.'.'.
        $picture ->getClientOriginalExtension();
            $picture->move('images/users/',$name);
        $pro ->photo =$name;

    }

        $pro->nik =$request->nik;
        $pro->name =$request->name;
        $pro->gender =$request->gender;
        $pro->dob =$request->dob;
        $pro->address =$request->address;
        $pro->phone =$request->phone;

        if ($request->email){
            $pro->email =$request->email;
        }

        if ($request ->password){
            $pro->password=bcrypt($request->password);

        }

        $pro->save();
        return redirect()->route('user-index')->with('success','Biodata Pengguna berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = User::find($id);
        $destroy->delete();
        return redirect('/list-pengguna');
    }
}
