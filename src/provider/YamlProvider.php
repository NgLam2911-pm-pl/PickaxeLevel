<?php
declare(strict_types=1);

namespace PickaxeLevel\provider;

use PickaxeLevel\Loader;
use pocketmine\utils\Config;

class YamlProvider{

	protected Loader $loader;
	protected Config $sql_config, $block_exp, $plugin_config, $pickaxe_config;

	protected function getLoader() : Loader{
		return $this->loader;
	}

	public function __construct(Loader $loader){
		$this->loader = $loader;
	}

	public function init() : void{
		$this->sql_config = new Config($this->getLoader()->getDataFolder() . "sql_config.yml", Config::YAML);
		$this->block_exp = new Config($this->getLoader()->getDataFolder() . "block_exp.yml", Config::YAML);
		$this->plugin_config = new Config($this->getLoader()->getDataFolder() . "plugin_config.yml", Config::YAML);
		$this->pickaxe_config = new Config($this->getLoader()->getDataFolder() . "pickaxe_config.yml", Config::YAML);
	}

	public function close() : void{
		$this->sql_config->save();
		$this->block_exp->save();
		$this->plugin_config->save();
		$this->pickaxe_config->save();
	}

	public function reload() : void{
		$this->sql_config->reload();
		$this->block_exp->reload();
		$this->plugin_config->reload();
		$this->pickaxe_config->save();
	}

	public function getSqlConfigData() : array{
		return $this->sql_config->getAll();
	}

	public function getBlockExpData() : array{
		return $this->block_exp->getAll();
	}

	public function getPluginConfigData() : array{
		return $this->plugin_config->getAll();
	}

	public function getPickaxeConfigData() : array{
		return $this->pickaxe_config->getAll();
	}

}