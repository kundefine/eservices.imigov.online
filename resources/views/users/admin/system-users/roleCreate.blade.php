@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('title', 'System User - Create Role')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">System Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Role</li>
    </ol>
</nav>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">

            <form action="{{route('roleStore')}}" method="post">
                <div class="card">
                    <div class="card-header">{{ __('Create New Role') }}</div>
                    <div class="card-body">

                            @csrf
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Ex: Super Admin, IT, Accounts">
                            </div>
                            <div class="form-group">
                                <label for="">Select Permissions</label>
                                <div class="row">
                                    @foreach($permissions as $permission)
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->id}}">
                                                    {{$permission->name}}
                                                </label>
                                            </div>
                                            @php
                                                $child_list = \Spatie\Permission\Models\Permission::where(['parent_name' => $permission->name], ['guard_name' => $permission->guard_name])->get();
                                            @endphp
                                            @if($child_list->count())
                                            <div class="permission-child ml-5">
                                                @foreach($child_list as $child)
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$child->id}}">
                                                            {{str_replace($permission->name . '-','',$child->name)}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Create Role</button>
                    </div>
                </div>
            </form>
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