<?php
declare(strict_types=1);

namespace PickaxeLevel;

use PickaxeLevel\listener\EventListener;
use PickaxeLevel\provider\Provider;
use PickaxeLevel\session\PlayerSessionManager;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{
	protected PlayerSessionManager $sessionManager;
	protected Provider $provider;

	protected function onEnable() : void{
		$this->sessionManager = new PlayerSessionManager();
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->provider = new Provider($this);
		//TODO: Alot of thing...
	}

	public function getSessionManager() : PlayerSessionManager{
		return $this->sessionManager;
	}

	public function getProvider() : Provider{
		return $this->provider;
	}
}