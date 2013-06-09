<?php

class Testuser extends Eloquent {
	public $table = 'test_users';

    protected $guarded = array();

    public static $rules = array();
}