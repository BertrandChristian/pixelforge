@extends('layouts.master')
@section('title', 'User List')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="top-section">
    User List
</div>
<br>
<div class="search-section">
    <input type="text" placeholder="🔍 Search">
</div>
<br>
<x-app-layout>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4 bg-black">
                    @if(\Illuminate\Support\Facades\Session::has('msg'))
                        <div class="alert alert-danger">{{ Session::get('msg') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <table id="table-user" class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role ?? 'N/A' }}</td>
                                    <td>
                                        <form action="{{ route('user-delete', ['user' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No users found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

</x-app-layout>

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#table-user').DataTable();
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection
