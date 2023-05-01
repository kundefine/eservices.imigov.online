@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
@endpush

@section('title', 'PraStatus - Create New PraStatus')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">PraStatus</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create New PraStatus</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div id="prastatus-create-form">
                <form action="{{route('praStatusStore')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h6>Create</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="" class="">Application Number</label>
                                <input type="text" class="form-control" name="application_no">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Employer Identification Card No.</label>
                                <input type="text" class="form-control" name="employer_identification_card_no">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Company Registration No.</label>
                                <input type="text" class="form-control" name="company_registration_no">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Name of Maid/Employee</label>
                                <input type="text" class="form-control" name="employee_name">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Document Number</label>
                                <input type="text" class="form-control" name="document_no">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Status</label>
                                <select class="form-control" name="status">
                                    <option value="">Please Select One</option>
                                    <option value="ACCEPTED">ACCEPTED</option>
                                    <option value="NEW">NEW</option>
                                    <option value="REJECT">REJECT</option>
                                    <option value="CANCELLED">CANCELLED</option>
                                    <option value="PAY">PAY</option>
                                    <option value="PRINT">PRINT</option>
                                    <option value="TOUGH">TOUGH</option>
                                    <option value="PASS">PASS</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm float-right">Create PraStatus</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')

    {{--    <script src="{{asset('js/react/company.js')}}"></script>--}}
@endpush
