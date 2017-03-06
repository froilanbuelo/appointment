<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class EventActivationController extends Controller
{
    public function activate($id){
    	Auth::user()->events()->find($id)->update(['is_active'=>1]);
    	return redirect()->route('event.index');
    }

    public function deactivate($id){
    	Auth::user()->events()->find($id)->update(['is_active'=>0]);
    	return redirect()->route('event.index');
    }
}
