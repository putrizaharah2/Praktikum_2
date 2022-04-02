<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        $data=[
            'title'=>'Daftar Petugas',
            'users'=> User::where('role','Admin')->get(),
            // 'route'=>route('user.create'),
        ];
        return view('admin.user.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'form_title'=>'Tambah Petugas Baru',
            'method'=> 'POST',
            // 'route'=>route('user-store')

        ];
        return view('admin.user.create', $data);
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
            'nik'=> 'required|unique:users',
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:6',
        ]);

        $user = new User();
        $user ->nik= $request ->nik;
        $user ->name= $request ->name;
        $user ->email= $request ->email;
        $user ->password= bcrypt($request->password);
        $user ->role= 'Admin';
        $user ->save();
        return redirect() -> route('petugas-index') ->with('message', 'Petugas berhasil dibuat');
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
            'form_title'=>'Ubah Data Petugas',
            'method' =>'PUT' ,
            'route'=>route('petugas-update', $id) ,
            'user'=> user::where('id', $id)->first(),
        ];
        return view('admin.user.edit', $data);

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
        return redirect()->route('pegawai-index')->with('success','Biodata Petugas berhasil diperbaharui');
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
        return redirect('/list-user');
    }
}
