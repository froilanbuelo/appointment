@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Events</div>

                <div class="panel-body">
                    <table class="table table-striped">
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
                                <td><a href="">{{$event->link}}</a></td>
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
@endsection
