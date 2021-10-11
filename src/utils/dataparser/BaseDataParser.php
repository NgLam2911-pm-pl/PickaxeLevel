<?php
declare(strict_types=1);

namespace PickaxeLevel\utils\dataparser;

abstract class BaseDataParser{

	protected array $data;

	public function __construct(array $data){
		$this->data = $data;
	}

	public function getData() : array{
		return $this->data;
	}
}