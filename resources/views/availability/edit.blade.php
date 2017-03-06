@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Availability</div>

                <div class="panel-body">
                    @include('availability._form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('scripts')
<script src="{{asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    jQuery(document).ready(function($) {
        $("#date_range_start, #date_range_end").datepicker({format: 'yyyy-mm-dd'});
         $('#backToDetails').click(function(){
            window.location.href='{{route('event.edit',$form->getModel()->event_id)}}';
        })
        $('#availability_type').change(function() {
            if ($("#availability_type").val() == "D") {
                $("#rolling_days").removeAttr('disabled');
                $("#date_range_start").attr('disabled', 'disabled');
                $("#date_range_end").attr('disabled', 'disabled');
            } else if ($("#availability_type").val() == "R") {
                $("#rolling_days").attr('disabled', 'disabled');
                $("#date_range_start").removeAttr('disabled');
                $("#date_range_end").removeAttr('disabled');
            } else {
                $("#rolling_days").attr('disabled', 'disabled');
                $("#date_range_start").attr('disabled', 'disabled');
                $("#date_range_end").attr('disabled', 'disabled');
            }
        }).change();
    });
</script>
@endsection
