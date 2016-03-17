<?php

class MapController extends BaseController {
	public function index()
	{
		$query = Request::query();
		$targetID = $query['targetMapId'];

		$map = Map::find($targetID);

		$headers = [
			'Content-type'=> 'application/json; charset=utf-8'
		];

		$mapNextArray = explode(",", $map->mapNext);
		$mapItemsArray = explode(",", $map->mapItems);

		$ret = [
			'result'  => true,
			'data' =>
			array(
			[
				'mapId' => $map->mapId,
				'mapName' => $map->mapName,
				'mapType' => $map->mapType,
				'mapNext' => $mapNextArray,
				'mapItems' => $mapItemsArray,
			])
		];

		return Response::json($ret, 200, $headers, JSON_UNESCAPED_UNICODE);
	}
}
