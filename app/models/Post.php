<?php

class Post extends \Eloquent
{
    protected $guarded = [];

    public static $rules = [
        'title' => 'required|unique:posts',
        'body' => 'required'
    ];


    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
}