<?php
declare(strict_types=1);

namespace PickaxeLevel\listener;

use PickaxeLevel\Loader;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;

class EventListener implements Listener{

	protected Loader $loader;

	public function __construct(Loader $loader){
		$this->loader = $loader;
	}

	/**
	 * @param BlockBreakEvent $event
	 * @priority MONITOR
	 * @handleCancelled FALSE
	 */
	public function onBreak(BlockBreakEvent $event){
		//TODO: Implement BlockBreakEvent handle
	}
}