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
                  <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nik</label>
                            <input type="text" class="form-control" placeholder="nik" name="nik" value="{{ $article->nik}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="nama" value="{{ $article->nama}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Tanggallahir</label>
                            <input type="text" class="form-control" name="tanggallahir" placeholder="tanggallahir" value="{{ $article->tanggallahir}}">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="alamat" value="{{ $article->alamat}}">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Gmail</label>
                            <input type="text" class="form-control" name="gmail" placeholder="gmail" value="{{ $article->gmail}}">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Telpon</label>
                            <input type="text" class="form-control" name="telpon" placeholder="telpon" value="{{ $article->telpon}}">
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
