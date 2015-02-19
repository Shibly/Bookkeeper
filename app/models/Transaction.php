<?php

class Transaction extends \Eloquent
{
    protected $guarded = [];


    public static $rules = array(
        'date' => 'required',
        'amount' => 'required|numeric',
        'description' => 'required',
        'method' => 'required'
    );

}