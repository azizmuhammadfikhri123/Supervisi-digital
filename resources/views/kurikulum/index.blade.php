@extends('backend.layout.main')
@section('title', 'Halaman Kurikulum')
@section('content')
<div class="container-fluid">
    @if (session('success_message'))
        <div class="alert alert-success">
            {{session('success_message')}}
        </div>
    @endif
    {{-- data table --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('add-kurikulum')}}" class=" m-0 font-weight-bold text-white btn btn-primary btn-sm float-right">
                <i class="fas fa-plus"></i>
                Add User
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="data_table" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-primary">
                            <th>NO</th>
                            <th>NIP</th>
                            <th>ALAMAT</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>SUPERVISOR</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role}}</td>
                                <td>
                                    <form action="{{route('set-kurikulum', $item->id)}}" method="post">
                                        @method('patch')
                                        @csrf
                                        @if ($item->supervisor == 'ya')
                                            <button type="submit" class="btn btn-primary">Non Aktifkan</button>
                                        @elseif ($item->supervisor == 'tidak')
                                            <button type="submit" class="btn btn-danger">Aktifkan</button>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#modalEdit">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route('update', $item->id)}}" method="post">
                                                        @method('patch')
                                                        @csrf
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{route('delete', $item->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
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
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    } );
</script>
@endsection
