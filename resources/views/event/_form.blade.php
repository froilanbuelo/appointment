                    {!! form_start($form); !!}

                    {!! form_row($form->name, $options = ['attr' => ['placeholder'=>'What is your event about?']]); !!}
                    {!! form_row($form->location, $options = ['attr' => ['placeholder'=>'Where will your event take place?']]); !!}
                    {!! form_row($form->description, $options =['attr'=>['rows'=>3, 'placeholder'=>'Tell something about your event.']]); !!}
                    {!! form_label($form->link); !!}
                    <div class="row">
                        <div class="col-sm-6">
                            appointment.dev/{{Auth::user()->name}}/
                        </div>
                        <div class="col-sm-6">{!! form_widget($form->link); !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! form_row($form->duration_hours, $options = ['attr'=>['min'=>0, 'placeholder'=>0]]); !!}
                        </div>
                        <div class="col-sm-6">
                            {!! form_row($form->duration_minutes, $options = ['attr'=>['min'=>0, 'placeholder'=>0]]); !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! form_row($form->maximum_invitee, $options = ['default_value'=>1 ,'attr' => ['min'=>1, 'class' => 'form-control col-md-3']]); !!}
                        </div>
                        <div class="col-sm-6">{!! form_row($form->color); !!}</div>
                    </div>
                    <br>
                    <?php /*
                    <div class="row">
                        <div class="col-sm-3">
                            {!! form_row($form->is_active, $options=['label'=>'Active']); !!}
                        </div>
                        <div class="col-sm-3">
                            
                        </div>
                    </div>
                    */ ?>
                    {!! form_row($form->submit, $options = ['label' => 'Save and Continue', 'attr' => ['class' => 'pull-right btn btn-primary']]); !!}
                    {!! form_end($form, $renderRest = false); !!}