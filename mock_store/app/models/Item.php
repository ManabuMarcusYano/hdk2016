<?php

class Item extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'item';
	protected $guarded = 'itemId';
	protected $primaryKey = 'itemId';
	public $timestamps = false;

	public function player(){
		return $this->belongsTo('Player', 'playerItems');
	}
}
