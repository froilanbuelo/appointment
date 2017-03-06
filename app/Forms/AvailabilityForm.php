<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AvailabilityForm extends Form
{
    public function buildForm()
    {
        $this
        	->add('event_id', 'hidden')
            ->add('availability_type', 'select',['choices'=>['D'=>'Rolling Days','R'=>'Date Range','I'=>'Infinite Days']])
            ->add('rolling_days', 'text')
            ->add('date_range_start', 'text')
            ->add('date_range_end', 'text')
            ->add('increment_of', 'number')
            ->add('maximum_events_per_day', 'number')
            ->add('maximum_scheduling_notice', 'number')
            ->add('buffer_before', 'number')
            ->add('buffer_after', 'number')
            ->add('is_secret', 'checkbox')
            ->add('submit', 'submit')
        ;
    }
}
