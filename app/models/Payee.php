<?php

class Payee extends \Eloquent
{
    protected $guarded = [];

    public static $rules = array(
        'name' => 'required'
    );
}