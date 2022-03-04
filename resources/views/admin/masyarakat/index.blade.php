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
                        <a href="/add-masyarakat" class="btn btn-primary">Create Post</a>
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
                                <th scope="col"> Nik </th>
                                <th scope="col"> Nama </th>
                                <th scope="col"> Tanggallahir </th>
                                <th scope="col"> Alamat </th>
                                <th scope="col"> Gmail</th>
                                <th scope="col"> Telpon</th>

                            </thead>
                            <tbody>
                                @php $i=0 @endphp
                                @foreach ( $masyarakats as $masyarakat )
                                @php $i++ @endphp
                                <tr>
                                    <td> {{ $i }} </td>
                                    <td> {{ $masyarakat->nik }} </td>
                                    <td> {{ $masyarakat->nama }} </td>
                                    <td> {{ $masyarakat->tanggallahir }} </td>
                                    <td> {{ $masyarakat->alamat }} </td>
                                    <td> {{ $masyarakat->gmail }} </td>
                                    <td> {{ $masyarakat->telpon }} </td>
                                    <td>
                                        <a button type="button" href="{{route('masyarakat-edit', $masyarakat->id)}}" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('masyarakat-delete', $masyarakat->id)}}" method="POST">
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

