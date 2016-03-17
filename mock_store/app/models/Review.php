<?php

class Review extends Eloquent{
	public function company(){
		return $this->belongsTo('Company');
	}
	public function reviewer(){
		return $this->belongsTo('User', 'reviewer_id');
	}
	public function feedbacker(){
		return $this->belongsTo('User', 'feedbacker_id');
	}
}
