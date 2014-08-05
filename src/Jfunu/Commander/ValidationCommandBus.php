<?php namespace Jfunu\Commander;

use Illuminate\Foundation\Application;



class ValidationCommandBus implements CommandBus {

	protected $commandTranslator;

	protected $app;

	private $commandBus;

	public function __construct(DefaultCommandBus $commandBus, Application $app, CommandTranslator $commandTranslator) {

		$this->commandBus = $commandBus;

		$this->app = $app;

		$this->commandTranslator = $commandTranslator;
	}



	public function execute($command) {

		$validator = $this->commandTranslator->toValidator($command);

		if (class_exists($validator)) {

			$this->app->make($validator)->validate($command);
		}

		return $this->commandBus->execute($command);
	}
}