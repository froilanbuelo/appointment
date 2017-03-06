@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Event</div>

                <div class="panel-body">
                    @include('event._form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('color-selector/css/colorPicker.css')}}">
@endsection
@section('scripts')
<script src="{{asset('color-selector/js/jquery.colorPicker.js')}}"></script>
<script>
    jQuery(document).ready(function($) {
    $('#color').colorPicker();
  });
</script>
@endsection
