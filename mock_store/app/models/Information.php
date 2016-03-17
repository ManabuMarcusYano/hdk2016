<?php

class Information extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'informations';
	protected $guarded = 'id';
}
