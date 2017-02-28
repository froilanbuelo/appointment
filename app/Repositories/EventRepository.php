<?php

namespace App\Repositories;

use Auth;
use App\Event;

class EventRepository {
	protected $event;
	public function __construct(Event $event){
		$this->event = $event;
	}

	public function create($param = array()){
		$event = Event::create($param);
		Auth::user()->events()->save($event);
		return $event;
	}

	public function save($id = NULL, $param = array()){
		if ($id === NULL){
			return $this->create($param);
		}

		$event = Event::findOrFail($id);
		$event->fill($param);
		$event->save();
		Auth::user()->events()->save($event);
		return $event;
	}
}