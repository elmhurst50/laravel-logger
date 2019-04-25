@extends('dev::layouts.noSidebar')

@section('meta')
    <script type="text/javascript" src="https://www.google.com/jsapi?autoload=
{'modules':[{'name':'visualization','version':'1.1','packages':
['corechart']}]}"></script>
@stop

@section('content')
    @include('laravel-logger::common.modal')

    <div class="row">
        <div class="col-xs-12">
            @include('laravel-logger::common.form')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            @include('laravel-logger::common.table')
        </div>
    </div>
@stop

@push('scripts')
    @include('laravel-logger::common.script')
@endpush