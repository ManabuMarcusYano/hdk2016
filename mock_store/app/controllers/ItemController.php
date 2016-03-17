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
		$targetID = $query['targetItemId'];
		$newItemValue = $query['newItemValue'];

		$item = Item::find($targetID);

		$headers = [
			'Content-type'=> 'application/json; charset=utf-8'
		];

		// 更新
		$item->itemValue = $newItemValue;
		$item->save();

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

	public function findItemOwner()
	{
		$query = Request::query();
		$targetID = $query['targetItemId'];

		// $item = Item::with('player')->find($targetID);

		// $item = DB::table('item')
    //         ->leftJoin('player', 'item.itemId', 'in', 'player.playerItems')
    //         ->select('*')
    //         ->get();
		// $query = 'select * from item left join player on FIND_IN_SET(item.itemId, player.playerItems) where item.itemId = '.$targetID;
		// $item = DB::select(DB::raw($query))[0];

		// $item = DB::table('item')->leftJoin('player', function($join){
		// 	$join->on(DB::raw("find_in_set(item.itemId, player.playerItems)"));
		// });

		// $player = Player::whereRaw("find_in_set(".$targetID.", playerItems)=0")->take(1)->get();
		$query = 'SELECT * FROM player WHERE find_in_set("'.$targetID.'", playerItems)';
		$players = DB::select(DB::raw($query));

		$headers = [
			'Content-type'=> 'application/json; charset=utf-8'
		];

		$ret = [
			'result'  => true,
			'data' => $players
		];
		return Response::json($ret, 200, $headers, JSON_UNESCAPED_UNICODE);
	}
}
