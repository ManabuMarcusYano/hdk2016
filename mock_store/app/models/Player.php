<?php

class Player extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'player';
	protected $guarded = 'playerId';
	protected $primaryKey = 'playerId';
	public $timestamps = false;
}
