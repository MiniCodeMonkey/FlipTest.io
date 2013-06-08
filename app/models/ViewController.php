<?php

class ViewController extends Eloquent {
	public $table = 'controllers';

    protected $guarded = array();

    public static $rules = array();

    public function getViewDataAttribute($value)
    {
        return json_decode($value);
    }
}