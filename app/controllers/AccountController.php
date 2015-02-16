<?php

class AccountController extends AdminController
{

    /**
     * Display a listing of the resource.
     * GET /account
     *
     * @return Response
     */
    public function index()
    {
        $accounts = Account::orderBy('created_at', 'desc')->paginate(3);
        return View::make('accounts.index')->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new resource.
     * GET /account/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /account
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validator = Validator::make($input, Account::$rules);
        if ($validator->passes()) {

            /**
             * Save data to the account table
             */
            $account = new Account();
            $account->account_name = Input::get('account_name');
            $account->description = Input::get('description');
            $account->balance = Input::get('balance');
            $account->save();

            /**
             * Save data to the transaction table
             */

            $transaction = new Transaction();
            $transaction->type = 'Transfer';
            $transaction->account = Input::get('account_name');
            $transaction->amount = Input::get('balance');
            $transaction->payer = 'System';
            $transaction->date = date("Y/m/d");
            $transaction->description = Input::get('description');
            $transaction->cr = Input::get('balance');
            $transaction->bal = Input::get('balance');
            $transaction->save();


            return Redirect::route('transactions.index');
        }
        return Redirect::back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     * GET /account/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /account/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $account = Account::find($id);
        if (is_null($account)) {
            return Redirect::route('accounts.index');
        }
        return View::make('accounts.edit')->with('account', $account);
    }

    /**
     * Update the specified resource in storage.
     * PUT /account/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        //dd($input);
        $validator = Validator::make($input, Account::$rules);
        if ($validator->passes()) {
            Account::find($id)->update($input);
            return Redirect::route('accounts.index');
        }
        return Redirect::back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /account/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Account::find($id)->delete();
        return Redirect::route('accounts.index');
    }


    /**
     * Get total available balance over all accounts
     */

    public function balance()
    {
        $balance = Account::all();

        return View::make('accounts.balance')->with('balance', $balance)->with('sum', Account::getSum());
    }

}