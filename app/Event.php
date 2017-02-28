<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = ['name','location','description','link','maximum_invitee','color','is_active'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
