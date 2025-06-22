@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('title', 'System User - All Users')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">System Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Details</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">{{ __('Details') }}</div>
                <div class="card-body">
                    <div id="content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td>{{$admin->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$admin->email}}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>{{$admin->role->name}}</td>
                                </tr>
                                <tr>
                                    <td>Permission</td>
                                    <td>{{$admin->permission}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                    <div id="content">
                        <form action="{{route('adminPasswordUpdate', ['admin' => $admin])}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm float-right">Change</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if($admin->roles->count())
            <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">{{ __('Update Role') }}</div>

                        <div class="card-body">
                            <div id="content">
                                <form action="{{ route('adminRoleUpdate', ['admin' => $admin]) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label for="role" >Select Role</label>
                                        <select name="role" id="role" class="form-control" required {{$admin->role->name === get_default_role() ? 'disabled' : ''}}>
                                            <option value="">Please Select One</option>
                                            @foreach($roles as $role)
                                                @if($role->name !== get_default_role())
                                                    <option value="{{$role->id}}" @if($role->id == $admin->role->id) selected @endif>{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm float-right" {{$admin->role->name === get_default_role() ? 'disabled' : ''}}>
                                        {{$admin->role->name === get_default_role() ? 'Cannot change Role' : 'Change'}}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush