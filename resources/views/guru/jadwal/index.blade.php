@extends('backend.layout.main')
@section('title', 'Halaman Kurikulum')
@section('content')
<div class="container-fluid">
    @if (session('success_message'))
        <div class="alert alert-success">
            {{session('success_message')}}
        </div>
    @endif


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h5 class="m-0 pt-2 font-weight-bold text-primary">Jadwal</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <tr class="text-primary">
                                <th>NO</th>
                                <th>NIP</th>
                                <th>TANGGAL</th>
                                <th>PUKUL</th>
                                <th>SUPERVISOR</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalSupervisi as $item)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nip}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>{{$item->jam_awal}} - {{$item->jam_akhir}}</td>
                            <td>{{$item->id_supervisor}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    } );
</script>
@endsection
