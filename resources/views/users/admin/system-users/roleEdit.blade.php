@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('title', 'System User - Edit Role')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">System User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
        </ol>
    </nav>

    <div class="row">
        <form action="{{route('roleUpdate', ['role' => $role])}}" method="post">
            @csrf
            @method('patch')
            <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">{{ __('Update Role') }}</div>
                <div class="card-body">
                    <div id="content">
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Ex: Super Admin, IT, Accounts" value="{{$role->name}}">
                            </div>

                            <div class="form-group">
                                <label for="">Select Permissions</label>
                                <div class="row">

                                    @foreach($permissions as $permission)
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$permission->id}}"  @if($role->hasPermissionTo($permission->name)) checked @endif>
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
                                                                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$child->id}}" @if($role->hasPermissionTo($child->name)) checked @endif>
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
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Edit Role</button>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush