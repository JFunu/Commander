<?php namespace Jfunu\Commander\Events;


trait EventGenerator {

	public $pendingEvents = [];


	public function raiseEvent($event) {

		$this->pendingEvents[] = $event;
	}


	public function releaseEvents() {

		$events = $this->pendingEvents;

		$this->pendingEvents = [];

		return $events;
	}
}