<?php
declare(strict_types=1);

namespace PickaxeLevel\provider;

use PickaxeLevel\Loader;
use poggit\libasynql\DataConnector;
use poggit\libasynql\libasynql;

class SqliteProvider{

	protected Loader $loader;
	protected DataConnector $database;

	public function __construct(Loader $loader){
		$this->loader = $loader;
	}

	protected function getLoader() : Loader{
		return $this->loader;
	}

	protected function init() : void{
		$this->database = libasynql::create($this->getLoader(), $this->getLoader()->getProvider()->getYamlProvider()->getSqlConfigData(), [
			"sqlite", "sqlite.sql"
		]);

	}

	//TODO: SqliteProvider
}