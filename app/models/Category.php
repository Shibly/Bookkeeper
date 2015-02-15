<?php

class Category extends \Eloquent
{
    protected $guarded = [];
    public static $rules = array(
        'name' => 'required',
    );
}