<?php
declare(strict_types=1);

namespace PickaxeLevel\event;

use PickaxeLevel\event\utils\Issuer;
use PickaxeLevel\Loader;
use PickaxeLevel\session\PlayerSession;
use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;
use pocketmine\event\plugin\PluginEvent;
use pocketmine\Server;

class PlayerExpUpdateEvent extends PluginEvent implements Cancellable{
	use CancellableTrait;

	protected PlayerSession $session;
	protected Issuer $issuer;

	public function __construct(PlayerSession $session, Issuer $issuer){
		parent::__construct($this->getLoader());
		$this->session = $session;
		$this->issuer = $issuer;
	}

	protected function getLoader() : ?Loader{
		$loader = Server::getInstance()->getPluginManager()->getPlugin("PickaxeLevel");
		if ($loader instanceof Loader){
			return $loader;
		}
		return null;
	}

	public function getSession() : PlayerSession{
		return $this->session;
	}

	public function getIssuer() : Issuer{
		return $this->issuer;
	}
}