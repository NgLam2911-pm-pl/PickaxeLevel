<?php
declare(strict_types=1);

namespace PickaxeLevel\event;

use PickaxeLevel\event\utils\Issuer;
use PickaxeLevel\Loader;
use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;
use pocketmine\event\plugin\PluginEvent;
use pocketmine\player\Player;
use pocketmine\Server;

class PlayerExpUpdateEvent extends PluginEvent implements Cancellable{
	use CancellableTrait;

	public function __construct(Player $player, Issuer $issuer){
		parent::__construct($this->getLoader());
	}

	public function getLoader() : ?Loader{
		$loader = Server::getInstance()->getPluginManager()->getPlugin("PickaxeLevel");
		if ($loader instanceof Loader){
			return $loader;
		}
		return null;
	}
}