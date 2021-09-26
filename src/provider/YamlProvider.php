<?php
declare(strict_types=1);

namespace PickaxeLevel\provider;

use PickaxeLevel\Loader;
use pocketmine\utils\Config;

class YamlProvider{

	protected Loader $loader;
	protected Config $sql_config;

	public function __construct(Loader $loader){
		$this->loader = $loader;

		$this->sql_config = new Config($this->getLoader()->getDataFolder() . "sql_config.yml", Config::YAML);
	}

	protected function getLoader() : Loader{
		return $this->loader;
	}

	public function getSqlConfigData() : array{
		return $this->sql_config->getAll();
	}

}