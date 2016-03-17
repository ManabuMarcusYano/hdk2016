<?php

class PlayerController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$query = Request::query();
		$targetID = $query['targetPlayerId'];
		// dd($targetID);

		// $player = Player::whereRaw("playerId=" + $targetID)->take(1)->get();
		$player = Player::find($targetID);

		$headers = [
			'Content-type'=> 'application/json; charset=utf-8'
		];

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
