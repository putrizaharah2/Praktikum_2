@extends('layouts.admin.app')
@section('title','Daftar Petugas')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row ml-3">
                    <h4 class="card-title">{{ $title }}</h4>
                    <div class="d-flex ml-3">
                        <a href="/add-user" class="btn btn-primary">Tambah Petugas</a>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                <div class="card-body">
                  <div>
                    <table id="table_id" class="table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th> NIP </th>
                                    <th> Nama Lengkap </th>
                                    <th> Email</th>
                                    <th> Tanggal Registrasi</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0 @endphp
                                @foreach ( $users as $user )
                                @php $i++ @endphp
                                <tr>
                                    <td> {{ $i }} </td>
                                    <td> {{ $user->nik }} </td>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> {{ $user->created_at->format('d M Y H:i') }} </td>
                                    <td><form action="{{route('petugas-delete', $user->id)}}" method="POST">
                                        <a button type="button" href="{{route('petugas-edit', $user->id)}}" class="btn btn-warning">Edit</a>
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
    $('#table_id').DataTable(
        {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
        "columnDefs": [
            { width: 200, targets: 1 },
            { width: 200, targets: 2 }
            ],
            "fixedColumns": true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
            }
    },
    );
} );
</script>
@endsection
