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
                            <label>NIP</label>
                            <input type="text" class="form-control" placeholder="NIP" name="nik" value="{{ $user->nik}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ $user->name}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="gender" class="form-control">
                                <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            {{-- <input type="text" class="form-control" name="gender" placeholder="Jenis Kelamin" value="{{ $user->gender}}"> --}}
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="dob" placeholder="Tanggal Lahir" value="{{ $user->dob}}">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="address" placeholder="Alamat" value="{{ $user->address}}">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" name="phone" placeholder="No Telepon" value="{{ $user->phone}}">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email}}">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="formFile" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo', $user->photo??'') }}">
                                    @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
