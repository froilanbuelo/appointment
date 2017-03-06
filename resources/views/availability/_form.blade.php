                    {!! form_start($form); !!}
                    <div class="row">
                        <div class="col-sm-6">
                            {!! form_row($form->availability_type) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! form_row($form->rolling_days, $options = ['attr' => ['placeholder'=>'Rolling days in the future set for this event?']]); !!}
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-sm-4">
                            {!! form_row($form->date_range_start); !!}
                        </div>
                        <div class="col-sm-4">
                            {!! form_row($form->date_range_end); !!}
                        </div>
                        <div class="col-sm-4">
                            {!! form_row($form->increment_of, $options = ['attr'=>['min'=>0, 'placeholder'=>0]]); !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! form_row($form->maximum_events_per_day, $options = ['attr'=>['min'=>0, 'placeholder'=>0]]); !!}
                        </div>
                        <div class="col-sm-6">
                            {!! form_row($form->maximum_scheduling_notice, $options = ['attr'=>['min'=>0, 'placeholder'=>0]]); !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! form_row($form->buffer_before, $options = ['attr'=>['min'=>0, 'placeholder'=>0]]); !!}
                        </div>
                        <div class="col-sm-6">
                            {!! form_row($form->buffer_after, $options = ['attr'=>['min'=>0, 'placeholder'=>0]]); !!}
                        </div>
                    </div>
                    {!! form_row($form->is_secret)!!}
                    <button class="btn btn-default" id="backToDetails" type="button">Back to Event Details</button>
                    {!! form_row($form->submit, $options = ['label' => 'Save and Continue', 'attr' => ['class' => 'pull-right btn btn-primary']]); !!}
                    {!! form_end($form, $renderRest = true); !!}