@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />

@endpush

@section('title', 'Form Generator - All Forms')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Form Generator</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Form Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Form Generator List</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>UUID</th>
                                <th>Form Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($formGenerators as $formGenerator)
                                <tr>
                                    <td style="width: 300px">{{$formGenerator->uuid}}</td>
                                    <td>{{$formGenerator->name}}</td>
                                    <td>
                                        <form action="{{route('formGeneratorDestroy', ['formGenerator' => $formGenerator])}}" class="d-inline-block mr-2" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-icon btn-rounded">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>

                                        <a href="{{route('formGeneratorEdit', ['formGenerator' => $formGenerator])}}" class="btn btn-light btn-icon btn-rounded d-inline-flex justify-content-center align-items-center">
                                            <i class="fa fa-pencil"></i>
                                        </a>
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