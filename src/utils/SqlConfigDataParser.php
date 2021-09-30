<?php
declare(strict_types=1);

namespace PickaxeLevel\utils;

class SqlConfigDataParser{

	protected array $data;

	public function __construct(array $data){
		$this->data = $data;
	}

	public function getDBConfig() : array{
		return $this->data["database"];
	}
}