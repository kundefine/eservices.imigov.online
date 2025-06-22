@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
@endpush

@section('title', 'Company - Create New Company')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Company</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create New Company</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div id="company-react"></div>
        </div>
    </div>
@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')

    <script src="{{asset('js/react/company.js')}}"></script>
@endpush