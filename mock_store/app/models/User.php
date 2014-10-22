<?php

class User extends Eloquent{
	protected $guarded = [];
	protected $visible = ['id', 'company_id', 'name']; // PW、メールアドレスは隠す
}
