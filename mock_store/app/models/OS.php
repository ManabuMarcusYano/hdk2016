<?php

class OS extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'oses';
	protected $guarded = 'id';
}
