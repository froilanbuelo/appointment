@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Events
                    <div class="pull-right"><a href="{{route('event.create')}}">New</a></div>
                </div>

                <div class="panel-body">
                    <table class="table table-striped" data-form="eventForm">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Link</td>
                                <td>Status</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>{{$event->name}}</td>
                                <td><a href="{{$event->getUrl()}}">{{$event->link}}</a></td>
                                <td>{{$event->is_active?"On":"Off"}}</td>
                                <td>
                                    <div class="dropdown">
                                        <span class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="dropdown" style="cursor: pointer; " ></span>
                                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                                            <li><a href="{{route('event.edit',$event->id)}}">Edit</a></li>
                                            @if($event->is_active)
                                            <li><a href="{{route('event.deactivate',$event->id)}}">Deactivate</a></li>
                                            @else
                                            <li><a href="{{route('event.activate',$event->id)}}">Activate</a></li>
                                            @endif
                                            <li><a href="" class="form-delete">
                                            {!! Form::model($event, ['method' => 'delete', 'route' => ['event.destroy', $event->id], 'class' =>'form-inline form-delete']) !!}
                                                {!! Form::hidden('id', $event->id) !!}
                                                Delete
                                            {!! Form::close() !!}
                                            
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you, want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
jQuery(document).ready(function($) {
    $('table[data-form="eventForm"]').on('click', '.form-delete', function(e){
        e.preventDefault();
        var $form=$(this);
        $('#confirm').modal({ backdrop: 'static', keyboard: false })
            .on('click', '#delete-btn', function(){
                $form.submit();
            });
    });
});
</script>
@endsection
