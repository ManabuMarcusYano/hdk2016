<?php

class Review extends Eloquent{
	public function company(){
		return $this->belongsTo('company');
	}
	public function reviewer(){
		return $this->belongsTo('user', 'reviewer_id');
	}
	public function feedbacker(){
		return $this->belongsTo('user', 'feedbacker_id');
	}
}
