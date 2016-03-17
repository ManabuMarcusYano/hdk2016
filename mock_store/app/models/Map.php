<?php

class Map extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'map';
	protected $guarded = 'mapId';
	protected $primaryKey = 'mapId';
	public $timestamps = false;
}
