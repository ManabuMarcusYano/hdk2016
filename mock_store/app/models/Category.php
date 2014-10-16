<?php

class Category extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'categories';
	protected $guarded = 'id';
}
