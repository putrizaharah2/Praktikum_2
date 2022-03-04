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
                  <form action="/store-masyarakat" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nik</label>
                            <input type="text" class="form-control" placeholder="nik" name="nik">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="nama">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Tanggal lahir</label>
                            <input type="text" class="form-control" name="tanggallahir" placeholder="tanggal lahir">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control " name="alamat" placeholder="alamat">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Gmail</label>
                            <input type="text" class="form-control " name="gmail" placeholder="gmail">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Telpon</label>
                            <input type="text" class="form-control " name="telpon" placeholder="telpon">
                          </div>
                        </div>
                      </div>

                           <div class="row">
                            <div class="update ml-3">
                              <button type="submit" class="btn btn-primary btn-round">Create</button>
                            </div>
                          </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
