<?php namespace Jfunu\Commander;


interface CommandBus {


	public function execute($command);
}