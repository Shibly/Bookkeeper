<?php

/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/8/2015
 * Time: 12:03 AM
 */
class Category extends \Eloquent
{
    public static $rules = array(
        'name' => 'required'
    );
}