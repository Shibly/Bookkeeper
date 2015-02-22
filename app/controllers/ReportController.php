<?php

class ReportController extends AdminController
{

    public function getAccountStatement()
    {

        $accounts = array();
        foreach (Account::all() as $account) {
            $accounts[$account->account_name] = $account->account_name;
        }
        return View::make('reports.account-statement')->with('accounts', $accounts);
    }


    public function postAccountStatement()
    {
        dd('You call me bitch');
    }

}