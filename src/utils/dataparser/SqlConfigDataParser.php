<?php
declare(strict_types=1);

namespace PickaxeLevel\utils\dataparser;

class SqlConfigDataParser extends BaseDataParser{
	public function getDBConfig() : array{
		return $this->getData()["database"];
	}
}