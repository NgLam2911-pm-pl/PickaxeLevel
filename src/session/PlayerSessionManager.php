<?php
declare(strict_types=1);

namespace PickaxeLevel\session;

use RuntimeException;
use pocketmine\player\Player;

class PlayerSessionManager{

	/** @var PlayerSession[] */
	protected array $sessions = [];

	public function __construct(){
	}

	public function getSession(Player $player) : ?PlayerSession{
		if (isset($this->sessions[$player->getName()])){
			return $this->sessions[$player->getName()];
		}
		return null;
	}

	/**
	 * @param PlayerSession $session
	 * @param bool          $overwrite
	 *
	 * @throws RuntimeException
	 */
	public function addSession(PlayerSession $session, bool $overwrite = false) : void{
		$player = $session->getPlayer();
		if (($this->getSession($player) === null) or $overwrite){
			$this->sessions[$player->getName()] = $session;
		} else {
			throw new RuntimeException("Trying to overwrite already existing PlayerSession");
		}
	}
}