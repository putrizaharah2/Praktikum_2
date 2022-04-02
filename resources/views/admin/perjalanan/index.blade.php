@extends('layouts.admin.app')
@section('title','Catatan Perjalanan')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row ml-3">
                    <h4 class="card-title">{{ $title }}</h4>
                    <div class="d-flex ml-3">
                        <a href="{{ $route }}" class="btn btn-primary">Tambah Perjalanan</a>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                <div class="card-body">
                  <div>
                        <table id ="table_id" class="display">
                            <thead>
                                <th> #</th>
                                <th> NIK </th>
                                <th> Nama Lengkap </th>
                                <th> Tanggal </th>
                                <th> Waktu</th>
                                <th> Lokasi</th>
                                <th> Alamat</th>
                                <th> Suhu Tubuh</th>
                                <th> </th>
                            </thead>
                            <tbody>
                                @php $i=0 @endphp
                                @foreach ( $capers as $caper )
                                @php $i++ @endphp
                                <tr>
                                    <td> {{ $i }} </td>
                                    <td> {{ $caper->user->nik }} </td>
                                    <td> {{ $caper->user->name }} </td>
                                    <td> {{ $caper->created_at->format('d M Y') }} </td>
                                    <td> {{ $caper->created_at->format('H:i') }} </td>
                                    <td> {{ $caper->lokasi }} </td>
                                    <td> {{ $caper->alamat_lokasi }} </td>
                                    <td> {{ $caper->suhu }} &#8451; </td>
                                    <td><form action="{{ route('perjalanan-delete',$caper->id) }}" method="POST">
                                        <a button type="button" href="{{ route('perjalanan-edit',$caper->id) }}" class="btn btn-warning">Edit</a>
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
        // "columnDefs": [
        //     { width: 200, targets: 1 },
        //     { width: 250, targets: 2 },
        //     { width: 200, targets: 4 }
        //     ],
        //     "fixedColumns": true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
            }
    },
    );
} );
</script>
@endsection
