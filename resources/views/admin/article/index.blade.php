@extends('layouts.admin.app')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row ml-3">
                    <h4 class="card-title">{{ $title }}</h4>
                    <div class="d-flex ml-3">
                        <a href="/add-article" class="btn btn-primary">Create Post</a>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                        <table class="table">
                            <thead class="text-black">
                                <th scope="col">#</th>
                                <th scope="col"> Image </th>
                                <th scope="col"> Title </th>
                                <th scope="col"> Description </th>
                                <th scope="col"> Slug </th>
                                <th scope="col"> Body</th>
                                <th scope="col"> Action</th>

                            </thead>
                            <tbody>
                                @php $i=0 @endphp
                                @foreach ( $articles as $article )
                                @php $i++ @endphp
                                <tr>
                                    <td> {{ $i }} </td>
                                    <td><img src="{{ asset('/assets/article/'.$article->image) }}" style="max-height: 150px" alt="" class="img-thumbnail"></td>
                                    <td> {{ $article->title }} </td>
                                    <td> {{ $article->description }} </td>
                                    <td> {{ $article->slug }} </td>
                                    <td> {{ $article->body }} </td>
                                    <td>
                                        <a button type="button" href="{{route('article-edit', $article->id)}}" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('article-delete', $article->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                })
            </div>
        </div>
    </div>
</div>
@endsection

