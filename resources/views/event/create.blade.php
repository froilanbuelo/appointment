@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Event</div>

                <div class="panel-body">
                    {!! form_start($form); !!}

                    {!! form_until($form, 'link'); !!}
                    <div class="row">
                        <div class="col-sm-3">
                            {!! form_row($form->maximum_invitee, $options = ['attr' => ['class' => 'form-control col-md-3']]); !!}
                        </div>
                        <div class="col-sm-9"></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            {!! form_label($form->color); !!}  
                            <select name="color" id="color">
                                <option value="106" data-color="#A0522D">sienna</option>
                                <option value="47" data-color="#CD5C5C">indianred</option>
                                <option value="87" data-color="#FF4500">orangered</option>
                                <option value="17" data-color="#008B8B">darkcyan</option>
                                <option value="18" data-color="#B8860B">darkgoldenrod</option>
                                <option value="68" data-color="#32CD32">limegreen</option>
                                <option value="42" data-color="#FFD700">gold</option>
                                <option value="77" data-color="#48D1CC">mediumturquoise</option>
                                <option value="107" data-color="#87CEEB">skyblue</option>
                                <option value="46" data-color="#FF69B4">hotpink</option>
                                <option value="47" data-color="#CD5C5C">indianred</option>
                                <option value="64" data-color="#87CEFA">lightskyblue</option>
                                <option value="13" data-color="#6495ED">cornflowerblue</option>
                                <option value="15" data-color="#DC143C">crimson</option>
                                <option value="24" data-color="#FF8C00">darkorange</option>
                                <option value="78" data-color="#C71585">mediumvioletred</option>
                                <option value="123" data-color="#000000">black</option>
                            </select>
                        </div>
                        <div class="col-sm-9"></div>
                    </div>
                    
                    {!! form_row($form->is_active); !!}
                    {!! form_row($form->submit, $options = ['attr' => ['class' => 'btn btn-primary']]); !!}
                    {!! form_end($form, $renderRest = false); !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#color').colorselector();
</script>
@endsection
