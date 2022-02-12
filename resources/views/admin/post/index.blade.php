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
                        <a href="/add-post" class="btn btn-primary">Create Post</a>
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
                                <th scope="col"> Name </th>
                                <th scope="col"> Country </th>
                                <th scope="col"> City </th>
                                <th scope="col"> Salary </th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                    <td> Dakota Rice </td>
                                    <td> Niger </td>
                                    <td> Oud-Turnhout </td>
                                    <td > $36,738 </td>
                                    <td>
                                    <form method="" action="">
                            <a button type="button" class="btn btn-primary" href="#">Read</button></a>
                                <a button type="button" class="btn btn-warning" href="/edit-post">Edit</button></a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

