<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = ['event_id','availability_type','rolling_days','date_range_start','date_range_end','increment_of','maximum_events_per_day','maximum_scheduling_notice','buffer_before','buffer_after','is_secret'];

    public function event(){
    	return $this->belongsTo('App\Event');
    }
}
