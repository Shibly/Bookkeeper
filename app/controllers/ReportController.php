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

        //dd(Input::get('account-type'));
        if (Input::get('account-type') == 'all-transactions') {
            $results = Transaction::where('account', '=', Input::get('account_name'))->get();
            foreach ($results as $result) {
                echo $result->amount . '<br>';
                echo $result->dr . '<br>';
                echo $result->cr . '<br>';
                echo $result->bal . '<br>';
                echo $result->date . '<br>';
            }
        }
    }

}