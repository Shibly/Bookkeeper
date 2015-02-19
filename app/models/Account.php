<?php

class Account extends \Eloquent
{
    protected $guarded = [];

    public static $rules = array(
        'account_name' => 'required',
        'description' => 'required',
        'balance' => 'required|numeric',
    );


    public static function getSum()
    {
        $accounts = Account::all();
        $res = 0;
        foreach ($accounts as $account) {
            $res += $account->balance;
        }
        return $res;
    }
}