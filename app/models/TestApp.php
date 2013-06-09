<?php

class TestApp extends Eloquent {
	public $table = 'apps';

    protected $guarded = array();

    public static $rules = array();
}