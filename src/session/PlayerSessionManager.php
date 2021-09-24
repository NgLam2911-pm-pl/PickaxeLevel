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

	public function getSession(Player|string $player) : ?PlayerSession{
		if ($player instanceof Player) $player = $player->getName();
		if (isset($this->sessions[$player])){
			return $this->sessions[$player];
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

	public function removeSession(Player|PlayerSession|string $player) : void{
		if ($player instanceof Player) $player = $player->getName();
		if ($player instanceof PlayerSession) $player = $player->getPlayer()->getName();

		if ($this->getSession($player) !== null){
			unset($this->sessions[$player]);
		}
	}
}