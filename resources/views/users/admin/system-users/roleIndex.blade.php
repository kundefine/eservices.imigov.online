@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('title', 'System User - All Users')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">System Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Roles</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Roles</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td style="width: 868px;overflow: hidden;padding: 5px;white-space: normal;line-height: 30px;">
                                    {!! $role->permissions()->count() ? $role->permissions->pluck('name')->implode(' , ') : '' !!}
                                </td>

                                <td>
                                    @if($role->name !== get_default_role())
                                        <a href="{{route('roleEdit', ['role' => $role])}}" class="">
                                            <i data-feather="edit-2"></i>
                                        </a>
                                    @endif
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
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush