@extends('layout.app')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
    <style>
        .left-side {
            border-right: 2px solid #ddd;
            padding-right: 20px;
        }
    </style>
@endpush

@section('content')
    <a href="{{route('pra_status')}}">Demo One</a>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/dragula/dragula.min.js') }}"></script>
@endpush

@push('custom-scripts')

@endpush
