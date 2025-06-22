@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
@endpush

@section('title', 'Form Generator - Create Form Generator')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Payment Method</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Payment Method</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="{{route('paymentMethodStore')}}" method="post">
                    @csrf
                    <div class="card-header bg-light">
                       Payment Method Form
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Payment Method Name: </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select type="text" name="type" id="type" class="form-control" required>
                                <option value="">Please Select One</option>
                                <option value="bkash" {{old('type') == "bkash" ? "selected" : null}}>Bkash</option>
                                <option value="nogod" {{old('type') == "nogod" ? "selected" : null}}>Nogod</option>
                                <option value="bank" {{old('type') == "bank" ? "selected" : null}}>Bank</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="form_generator_id">Select Form</label>
                            <select type="text" name="form_generator_id" id="form_generator_id" class="form-control">
                                <option value="">Please Select One</option>
                                @foreach($forms as $form)
                                    <option value="{{$form->id}}" {{$form->id == old('form_generator_id') ? "selected" : null}}>{{$form->name . "-" . $form->uuid}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group clearfix mb-0">
                            <button type="submit" class="btn btn-primary float-right">Add Payment Method</button>
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