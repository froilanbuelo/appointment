<?php

namespace App\Repositories;

use Auth;
use App\Event;

class EventRepository {
	protected $event;
	public function __construct(Event $event){
		$this->event = $event;
	}
	public function find($id){
		return $this->event->with('user')->findOrFail($id);
	}
	// public function findByAuthUser($id){
	// 	return Auth::user()->events()->with('user')->findOrFail($id);
	// }
	// public function getByAuthUser($id){
	// 	return Auth::user()->events()->with('user');
	// }
	public function create($param = array()){
		$event = Auth::user()->events()->create($param);
		$event->availability()->create(['availability_type'=>'D','rolling_days'=>60]);
		return $event;
	}
	// public function update($id = NULL, $param = array()){
	// 	if ($id === NULL){
	// 		return $this->create($param);
	// 	}
	// 	$event = Event::findOrFail($id);
	// 	$event->fill($param);
	// 	$event->save();
	// 	// Auth::user()->events()->save($event);
	// 	return $event;
	// }
}