@extends('layouts.admin.app')
@section('title','Daftar Pengguna')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row ml-3">
                    <h4 class="card-title">{{ $title }}</h4>
                    {{-- <div class="d-flex ml-3">
                        <a href="/add-masyarakat" class="btn btn-primary">Pengguna Baru</a>
                    </div> --}}
                    </div>
                </div>
                </div>
                </div>
                <div class="card-body">
                  <div>
                        <table id="table_id" class="table" style="width: 100%">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th> NIK </th>
                                <th> Nama </th>
                                <th> Tanggal Lahir </th>
                                <th> Alamat </th>
                                <th> E-Mail</th>
                                <th> Telpon</th>
                                <th> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0 @endphp
                                @foreach ( $masyarakats as $masyarakat )
                                @php $i++ @endphp
                                <tr>
                                    <td> {{ $i }} </td>
                                    <td> {{ $masyarakat->nik }} </td>
                                    <td> {{ $masyarakat->name }} </td>
                                    <td> {{ (is_null($masyarakat->dob) ? '' : \Carbon\Carbon::parse($masyarakat->dob)->format('d/m/Y') )}} </td>
                                    <td> {{ $masyarakat->address }} </td>
                                    <td> {{ $masyarakat->email }} </td>
                                    <td> {{ $masyarakat->phone }} </td>
                                    <td><form action="{{route('user-delete', $masyarakat->id)}}" method="POST">
                                        <a button type="button" href="{{route('user-edit', $masyarakat->id)}}" class="btn btn-warning">Edit</a>
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
            { width: 250, targets: 2 },
            { width: 200, targets: 4 }
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
