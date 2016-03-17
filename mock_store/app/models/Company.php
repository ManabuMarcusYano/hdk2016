<?php

class Company extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'companies';
	protected $guarded = 'id';
}
