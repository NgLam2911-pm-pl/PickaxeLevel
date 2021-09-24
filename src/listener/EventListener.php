<?php
declare(strict_types=1);

namespace PickaxeLevel\listener;

use PickaxeLevel\Loader;
use PickaxeLevel\session\PlayerSession;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class EventListener implements Listener{

	protected Loader $loader;

	public function __construct(Loader $loader){
		$this->loader = $loader;
	}

	protected function getLoader() : Loader{
		return $this->loader;
	}

	/**
	 * @param BlockBreakEvent $event
	 * @priority MONITOR
	 * @handleCancelled FALSE
	 */
	public function onBreak(BlockBreakEvent $event){
		//TODO: Implement BlockBreakEvent handle
	}

	public function onJoin(PlayerJoinEvent $event){
		//TODO: Load player session
	}

	public function onQuit(PlayerQuitEvent $event){
		//TODO: Save and unload player session
	}
}