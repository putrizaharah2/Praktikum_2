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
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ $article->title}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $article->description}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Slug" value="{{ $article->slug}}">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control textarea"name="body">{{ $article->body}}</textarea >
                          </div>
                        </div>
                      </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="formFile" class="form-label">Image</label>
                                <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" value="{{ old('image', $article->image??'') }}">
                                        @error('picture') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
