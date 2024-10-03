@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/table-datatable-jquery.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Management User</h3>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 order-md-1 order-last">
                <a href="{{ url('users/create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="table2">
                                        <thead>
                                            <tr>
                                                <th width="50%">Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->role < 1)
                                                            <span class="badge bg-success">{{ $user->roleName }}</span>
                                                        @else
                                                            <span class="badge bg-secondary">{{ $user->roleName }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="row justify-content-end">
                                                            <div class="col-auto">
                                                                <a href="{{ url('users', $user->id) }}" class="btn btn-sm btn-primary">
                                                                    Edit
                                                                </a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <form action="{{ url('users', $user->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
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
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        let customized_datatable = $("#table2").DataTable({
            responsive: true,
            ordering: false,
            pagingType: 'simple',
            dom: "<'row'<'col-3'l><'col-9'f>>" +
                "<'row dt-row'<'col-sm-12'tr>>" +
                "<'row'<'col-4'i><'col-8'p>>",
            "language": {
                "info": "Page _PAGE_ of _PAGES_",
                "lengthMenu": "_MENU_ ",
                "search": "",
                "searchPlaceholder": "Search.."
            }
        })
    </script>
@endpush
