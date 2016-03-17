<?php

class Banner extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'banners';
	protected $guarded = 'id';
}
