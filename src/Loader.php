<?php
declare(strict_types=1);

namespace PickaxeLevel;

use PickaxeLevel\listener\EventListener;
use PickaxeLevel\session\PlayerSessionManager;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{
	protected PlayerSessionManager $sessionManager;

	protected function onEnable() : void{
		$this->sessionManager = new PlayerSessionManager();
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		//TODO: Alot of thing...
	}
}