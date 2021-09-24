<?php
declare(strict_types=1);

namespace PickaxeLevel\provider;

use PickaxeLevel\Loader;

class Provider{

	protected Loader $loader;
	protected SqliteProvider $databaseProvider;
	protected YamlProvider $yamlProvider;

	public function __construct(Loader $loader){
		$this->loader = $loader;
		$this->databaseProvider = new SqliteProvider($this->getLoader());
		$this->yamlProvider = new YamlProvider($this->getLoader());
	}

	protected function getLoader() : Loader{
		return $this->loader;
	}

	public function getDatabaseProvider() : SqliteProvider{
		return $this->databaseProvider;
	}

	public function getYamlProvider() : YamlProvider{
		return $this->yamlProvider;
	}

}