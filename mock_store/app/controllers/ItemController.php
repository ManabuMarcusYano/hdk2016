<?php

class ItemController extends BaseController {

	public function index()
	{
		$query = Request::query();
		$targetID = $query['targetItemId'];
		$item = Item::find($targetID);

		$headers = [
			'Content-type'=> 'application/json; charset=utf-8'
		];

		$ret = [
			'result'  => true,
			'data' =>
			array(
			[
				'itemId' => $item->itemId,
				'itemName' => $item->itemName,
				'itemValue' => $item->itemValue,
				'itemEffectTarget' => $item->itemEffectTarget,
				'itemEffectValue' => $item->itemEffectValue,
			])
		];

		return Response::json($ret, 200, $headers, JSON_UNESCAPED_UNICODE);
	}

	public function update()
	{
		$query = Request::query();
		$targetID = $query['targetPlayerId'];
		$newPlayerHp = $query['newPlayerHp'];

		$player = Player::find($targetID);

		$headers = [
			'Content-type'=> 'application/json; charset=utf-8'
		];

		// 更新
		$player->playerHp = $newPlayerHp;
		$player->save();

		$playerItemsArray = explode(",", $player->playerItems);
		$ret = [
			'result'  => true,
			'data' =>
			array(
			[
				'playerId' => $player->playerId,
				'playerName' => $player->playerName,
				'playerHp' => $player->playerHp,
				'playerMp' => $player->playerMp,
				'playerExp' => $player->playerExp,
				'playerAtk' => $player->playerAtk,
				'playerDef' => $player->playerDef,
				'playerInt' => $player->playerInt,
				'playerAgi' => $player->playerAgi,
				'playerInt' => $player->playerInt,
				'playerItems' => $playerItemsArray,
				'playerMap' => $player->playerMap,
			])
		];

		return Response::json($ret, 200, $headers, JSON_UNESCAPED_UNICODE);
	}
}
