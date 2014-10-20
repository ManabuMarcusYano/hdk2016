<?php

class Application extends Eloquent{
	public function company(){
		return $this->belongsTo('company');
	}
	public function user(){
		return $this->belongsTo('user', 'manager_id');
	}

	public function category(){
		return $this->belongsTo('category', 'category_id');
	}
}
