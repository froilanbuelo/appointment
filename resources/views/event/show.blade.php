@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$eventInstance->user->name}}</div>

                <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2">Name</div>
                    <div class="col-sm-10">{{$eventInstance->name}}</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">Description</div>
                    <div class="col-sm-10">{{$eventInstance->description}}</div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
@endsection
@section('scripts')
<script>
    jQuery(document).ready(function($) {
    });
</script>
@endsection
