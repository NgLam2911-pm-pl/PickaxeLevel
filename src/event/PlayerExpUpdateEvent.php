<?php
declare(strict_types=1);

namespace PickaxeLevel\event;

use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;
use pocketmine\event\plugin\PluginEvent;

class PlayerExpUpdateEvent extends PluginEvent implements Cancellable{
	use CancellableTrait;
	//TODO
}