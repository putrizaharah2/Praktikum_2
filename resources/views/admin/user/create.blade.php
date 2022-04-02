@extends('layouts.admin.app')

@section('content')
   <div class="content">
        <div class="row">
          <div class="col-md-11">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">{{ $form_title }}</h5>
              </div>
              <div class="card-body">
                  <form action="/store-user" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>NIP</label>
                            <input type="text" class="form-control" placeholder="NIP" name="nik">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama Petugas</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>E-Mail</label>
                            <input type="text" class="form-control " name="email" placeholder="Email">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control " name="password" placeholder="Password">
                          </div>
                        </div>
                      </div>
                         <div class="row">
                            <div class="update ml-3">
                              <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                            </div>
                          </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
