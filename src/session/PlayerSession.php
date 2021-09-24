<?php
declare(strict_types=1);

namespace PickaxeLevel\session;

use pocketmine\player\Player;

class PlayerSession{

	protected Player $player;
	protected int $xp;
	protected int $level;

	public function __construct(Player $player, int $xp = 0, int $level = 0){
		$this->player = $player;
		$this->xp = $xp;
		$this->level = $level;
	}

	public function getPlayer() : Player{
		return $this->player;
	}

	public function getXp() : int{
		return $this->xp;
	}

	public function getLevel() : int{
		return $this->level;
	}

	public function setXp(int $xp) : void{
		$this->xp = $xp;
	}

	public function setLevel(int $level) : void{
		$this->level = $level;
	}

	public function addXp(int $xp) : void{
		$this->setXp($this->getXp() + $xp);
	}

	public function addLevel(int $level) : void{
		$this->setLevel($this->getLevel() + $level);
	}

	public function upgrade() : void{
		$this->setXp(0);
		$this->addLevel(1);
	}
}