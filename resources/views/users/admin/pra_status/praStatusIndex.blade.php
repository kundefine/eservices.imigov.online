@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />

@endpush

@section('title', 'Application - All Application')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Application</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Application List</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 50px">id</th>
                                <th>Application Date</th>
                                <th>Application Number</th>
                                <th>Nationality</th>
                                <th>No. Company Registration</th>
                                <th>Applicant Name</th>
                                <th>Document Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pra_status_list as $pra_status)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td style="width: 50px">{{$pra_status->id}}</td>
                                    <td>{{$pra_status->application_date->format('d/m/y')}}</td>
                                    <td>{{$pra_status->application_no}}</td>
                                    <td>{{$pra_status->employer_identification_card_no}}</td>
                                    <td>{{$pra_status->company_registration_no}}</td>
                                    <td>{{$pra_status->employee_name}}</td>
                                    <td>{{$pra_status->document_no}}</td>
                                    <td>{{$pra_status->status}}</td>
                                    <td>
                                        <form action="{{route('praStatusDelete', ['praStatus' => $pra_status])}}" class="d-inline-block mr-2" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-icon btn-rounded">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>

                                        <a href="{{route('praStatusEdit', ['praStatus' => $pra_status])}}" class="btn btn-light btn-icon btn-rounded d-inline-flex justify-content-center align-items-center">
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
