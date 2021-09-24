<?php
declare(strict_types=1);

namespace PickaxeLevel\event\utils;

use pocketmine\utils\EnumTrait;

/**
 * This doc-block is generated automatically, do not modify it manually.
 * This must be regenerated whenever registry members are added, removed or changed.
 * @see build/generate-registry-annotations.php
 * @generate-registry-docblock
 *
 * @method static Issuer NONE()
 * @method static Issuer ADD()
 */
final class Issuer{
	use EnumTrait;

	protected static function setup() : void{
		self::registerAll(
			new self("none"),
			new self("add"),
		);
	}
}