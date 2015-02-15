<?php

class Pmethod extends \Eloquent
{
    protected $guarded = [];

    public static $rules = array(
        'name' => 'required'
    );
}