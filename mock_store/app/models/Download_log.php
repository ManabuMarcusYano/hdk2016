<?php

class Download_log extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'download_logs';
	protected $guarded = 'id';
	public $timestamps = false;
}
