<?php
declare(strict_types=1);

namespace PickaxeLevel\provider;

use Generator;
use PickaxeLevel\Loader;
use PickaxeLevel\session\PlayerSession;
use PickaxeLevel\utils\SqlConfigDataParser;
use pocketmine\player\Player;
use poggit\libasynql\DataConnector;
use poggit\libasynql\libasynql;
use SOFe\AwaitGenerator\Await;

class SqliteProvider{

	protected Loader $loader;
	protected DataConnector $database;

	protected const INIT = "pickaxelevel.init";
	protected const REGISTER = "pickaxelevel.register";
	protected const REMOVE = "pickaxelevel.remove";
	protected const UPDATE_LEVEL = "pickaxelevel.update.level";
	protected const UPDATE_EXP = "pickaxelevel.update.exp";
	protected const SELECT_PLAYER = "pickaxelevel.select.player";
	protected const TOP = "pickaxelevel.select.top";

	protected function getLoader() : Loader{
		return $this->loader;
	}

	protected function asyncSelect(string $query, array $args = []) : Generator{
		$this->database->executeSelect($query, $args, yield, yield Await::REJECT);
		return yield Await::ONCE;
	}

	public function __construct(Loader $loader){
		$this->loader = $loader;
	}

	public function init() : void{
		$parser = new SqlConfigDataParser($this->getLoader()->getProvider()->getYamlProvider()->getSqlConfigData());
		$this->database = libasynql::create($this->getLoader(), $parser->getDBConfig(), [
			"sqlite", "sqlite.sql"
		]);

		$this->database->executeGeneric(self::INIT);
	}

	public function close() : void{
		if(isset($this->database)) $this->database->close();
	}

	public function registerByName(Player|string $player, int $level = 0, int $exp = 0) : void{
		if($player instanceof Player){
			$player = $player->getName();
		}
		$this->database->executeChange(self::REGISTER, [
			"player" => $player,
			"level" => $level,
			"exp" => $exp
		]);
	}

	public function registerByPlayerSession(PlayerSession $session) : void{
		$this->registerByName($session->getPlayer(), $session->getLevel(), $session->getExp());
	}

	public function removeByName(Player|string $player) : void{
		if($player instanceof Player){
			$player = $player->getName();
		}
		$this->database->executeChange(self::REMOVE, [
			"player" => $player
		]);
	}

	public function removeByPlayerSession(PlayerSession $session) : void{
		$this->removeByName($session->getPlayer());
	}

	public function updateLevel(Player|string $player, int $level) : void{
		if($player instanceof Player){
			$player = $player->getName();
		}
		$this->database->executeChange(self::UPDATE_LEVEL, [
			"player" => $player,
			"level" => $level
		]);
	}

	public function updateExp(Player|string $player, int $exp) : void{
		if($player instanceof Player){
			$player = $player->getName();
		}
		$this->database->executeChange(self::REGISTER, [
			"player" => $player,
			"exp" => $exp
		]);
	}

	public function updateByPlayerSession(PlayerSession $session) : void{
		$this->updateLevel($session->getPlayer(), $session->getLevel());
		$this->updateExp($session->getPlayer(), $session->getExp());
	}

	public function selectByPlayer(Player|string $player) : Generator{
		if($player instanceof Player){
			$player = $player->getName();
		}
		return $this->asyncSelect(self::SELECT_PLAYER, [
			"player" => $player
		]);
	}

	public function top() : Generator{
		return $this->asyncSelect(self::TOP);
	}
}