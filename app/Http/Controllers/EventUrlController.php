<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventUrlController extends Controller
{
    public function show($user,$event){

    	$eventInstance = 
    		Event::with('user')->whereHas('user', function ($query) use ($user) {
			    $query->where('username', '=', $user);
			})->where('link',$event)->first();
    	return view('event.show',compact('eventInstance'));
    }
}
