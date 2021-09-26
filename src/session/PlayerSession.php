<?php
declare(strict_types=1);

namespace PickaxeLevel\session;

use pocketmine\player\Player;

class PlayerSession{

	protected Player $player;
	protected int $exp;
	protected int $level;

	public function __construct(Player $player, int $exp = 0, int $level = 0){
		$this->player = $player;
		$this->exp = $exp;
		$this->level = $level;
	}

	public function getPlayer() : Player{
		return $this->player;
	}

	public function getExp() : int{
		return $this->exp;
	}

	public function getLevel() : int{
		return $this->level;
	}

	public function setExp(int $xp) : void{
		$this->exp = $xp;
	}

	public function setLevel(int $level) : void{
		$this->level = $level;
	}

	public function addExp(int $xp) : void{
		$this->setExp($this->getExp() + $xp);
	}

	public function addLevel(int $level) : void{
		$this->setLevel($this->getLevel() + $level);
	}

	public function upgrade() : void{
		$this->setExp(0);
		$this->addLevel(1);
	}
}