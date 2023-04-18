@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/flatpicker/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('title', 'Form Generator - Create Form Generator')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Sales</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create New Sale</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div id="sale-react"></div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpicker/flatpickr.min.js') }}"></script>
    <script>flatpickr('.flatpicker')</script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js') }}"></script>
    <script>
        window.servicesAjaxUrl = "{{route('serviceAjaxAll')}}";
        window.customerCreateAjaxUrl = "{{route('customerCreateAjax')}}";
        window.customerIndexAjaxUrl = "{{route('customerIndexAjax')}}";
        window.companyIndexAjaxUrl = "{{route('companyIndexAjax')}}";
        window.paymentMethodIndexAjaxUrl = "{{route('paymentMethodIndexAjax')}}";
    </script>
    <script src="{{asset('js/react/sale.js')}}"></script>

@endpush