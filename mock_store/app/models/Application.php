<?php

class Application extends Eloquent{
	public function company(){
		return $this->belongsTo('company');
	}
}
