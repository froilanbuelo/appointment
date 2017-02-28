@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">New Event</div>

                <div class="panel-body">
                    {!! form($form) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
