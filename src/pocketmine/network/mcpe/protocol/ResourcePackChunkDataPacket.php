<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/


namespace pocketmine\network\mcpe\protocol;

#include <rules/DataPacket.h>

class ResourcePackChunkDataPacket extends DataPacket {
	const NETWORK_ID = ProtocolInfo::RESOURCE_PACK_CHUNK_DATA_PACKET;

	public $packId;
	public $chunkIndex;
	public $progress;
	public $data;

	/**
	 *
	 */
	public function decode(){
		$this->packId = $this->getString();
		$this->chunkIndex = $this->getLInt();
		$this->progress = $this->getLLong();
		$this->data = $this->get($this->getLInt());
	}

	/**
	 *
	 */
	public function encode(){
		$this->reset();
		$this->putString($this->packId);
		$this->putLInt($this->chunkIndex);
		$this->putLLong($this->progress);
		$this->putLInt(strlen($this->data));
		$this->put($this->data);
	}
}