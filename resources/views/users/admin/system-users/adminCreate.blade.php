@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
@endpush

@section('title', 'System User - Create User')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">System Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create User</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-4">
            <div class="content">
                <form action="{{route('adminStore')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">Create New User</div>
                        <div class="card-error">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            @endif
                        </div>

                        <div class="card-body">
                            <div id="content">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Ex: Mr.Xyz, Mrs.Xyz" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="Ex: xyz@gmail.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" data-toggle="password" required>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" data-toggle="password" required>
                                </div>


                                <div class="form-group">
                                    @if($roles->count() > 1)
                                        <label for="role">Select Role</label>
                                        <select name="role" id="role" required>
                                            <option value="">Please select one Role</option>
                                            @foreach($roles as $role)
                                                @if($role->name !== get_default_role())
                                                    <option value="{{$role->id}}" {{old('role') == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @else
                                        Please create a Role for create New User<a href="{{route('roleCreate')}}"> create new role</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Create User</button>
                        </div>
                    </div>
                </form>

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
    <script src="{{ asset('assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js') }}"></script>
@endpush