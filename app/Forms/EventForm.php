<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class EventForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('location', 'text')
            ->add('description', 'textarea',['attr'=>['rows'=>4]])
            ->add('link', 'text')
            ->add('maximum_invitee', 'number',['attr'=>['min'=>0]])
            ->add('color', 'select')
            ->add('is_active', 'checkbox')
            ->add('submit', 'submit', ['label' => 'Save','attr'=>['class'=>'btn btn-primary']])
        ;
    }
}
/*
<option value="106" data-color="#A0522D">sienna</option>
<option value="47" data-color="#CD5C5C" selected="selected">indianred</option>
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
*/