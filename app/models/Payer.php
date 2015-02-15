<?php

class Payer extends \Eloquent
{
    protected $guarded = [];
    public static $rules = array(
        'name' => 'required'
    );
}