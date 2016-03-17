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
}
