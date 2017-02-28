@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">Something went wrong!</div>

                <div class="panel-body">
                    <p class="text-danger">Not authorized to perform this task.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
