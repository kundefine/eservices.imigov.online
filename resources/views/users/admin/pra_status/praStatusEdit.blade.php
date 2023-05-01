@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
@endpush

@section('title', 'PraStatus - Update PraStatus')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">PraStatus</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update PraStatus</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div id="prastatus-edit-form">
                <form action="{{route('praStatusUpdate', ['praStatus' => $pra_status])}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h6>Create</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="" class="">Application Number</label>
                                <input type="text" class="form-control" name="application_no" value="{{$pra_status->application_no}}">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Employer Identification Card No.</label>
                                <input type="text" class="form-control" name="employer_identification_card_no" value="{{$pra_status->employer_identification_card_no}}">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Company Registration No.</label>
                                <input type="text" class="form-control" name="company_registration_no" value="{{$pra_status->company_registration_no}}">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Name of Maid/Employee</label>
                                <input type="text" class="form-control" name="employee_name" value="{{$pra_status->employee_name}}">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Document Number</label>
                                <input type="text" class="form-control" name="document_no" value="{{$pra_status->document_no}}">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Status</label>
                                <select class="form-control" name="status">
                                    <option value="">Please Select One</option>
                                    <option value="ACCEPTED" @if($pra_status->status === "ACCEPTED") selected @endif>ACCEPTED</option>
                                    <option value="NEW" @if($pra_status->status === "NEW") selected @endif>NEW</option>
                                    <option value="REJECT" @if($pra_status->status === "REJECT") selected @endif>REJECT</option>
                                    <option value="CANCELLED" @if($pra_status->status === "CANCELLED") selected @endif>CANCELLED</option>
                                    <option value="PAY" @if($pra_status->status === "PAY") selected @endif>PAY</option>
                                    <option value="PRINT" @if($pra_status->status === "PRINT") selected @endif>PRINT</option>
                                    <option value="TOUGH" @if($pra_status->status === "TOUGH") selected @endif>TOUGH</option>
                                    <option value="PASS" @if($pra_status->status === "PASS") selected @endif>PASS</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm float-right">Update PraStatus</button>
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
