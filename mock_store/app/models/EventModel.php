<?php

// Eventは予約語
class EventModel extends Eloquent{
	// テーブル名とプライマリキーの指定をする際は両方必要
	protected $table = 'events';
	protected $guarded = 'id';
}
