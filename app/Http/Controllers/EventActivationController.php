<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class EventActivationController extends Controller
{
    public function activate($id){
    	Auth::user()->events()->find($id)->update(['is_active'=>1]);
    	Session::flash('flash_message', '<b>Success!</b> Event Activated.');
        Session::flash('flash_type', 'alert-success');
    	return redirect()->route('event.index');
    }
    public function deactivate($id){
    	Auth::user()->events()->find($id)->update(['is_active'=>0]);
    	Session::flash('flash_message', '<b>Success!</b> Event Deactivated.');
        Session::flash('flash_type', 'alert-success');
    	return redirect()->route('event.index');
    }
}
