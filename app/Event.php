<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = ['name','location','description','link','maximum_invitee','color','is_active','duration_hours','duration_minutes'];
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
