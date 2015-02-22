<?php

class TransactionController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /transaction
     *
     * @return Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'DESC')->paginate(10);
        return View::make('transactions.index')->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new resource.
     * GET /transaction/create
     *
     * @return Response
     */
    public function create()
    {
        $accounts = array();
        foreach (Account::all() as $account) {
            $accounts[$account->account_name] = $account->account_name;
        }

        //dd($accounts);

        $deposits = Transaction::where('type', '=', 'Income')->paginate(10);

        $payees = array();
        foreach (Payee::all() as $payee) {
            $payees[$payee->name] = $payee->name;
        }

        $incomeCategories = array();
        foreach (Category::where('type', '=', 'Income')->get() as $income) {
            $incomeCategories[$income->name] = $income->name;
        }

        $methods = array();
        foreach (Pmethod::all() as $method) {
            $methods[$method->name] = $method->name;
        }


        return View::make('transactions.create')
            ->with('accounts', $accounts)
            ->with('payees', $payees)
            ->with('incomes', $incomeCategories)
            ->with('methods', $methods)
            ->with('deposits', $deposits);
    }

    /**
     * Store a newly created resource in storage.
     * POST /transaction
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        //dd(Input::get('payee'));
        $validator = Validator::make($input, Transaction::$rules);
        if ($validator->passes()) {
            $transaction = new Transaction();
            $account = Account::where('account_name', '=', Input::get('account'))->first();
            $transaction->account = Input::get('account');
            $transaction->type = 'Income';
            $transaction->category = Input::get('category');
            $transaction->amount = Input::get('amount');
            $transaction->cr = Input::get('amount');
            $transaction->payee = Input::get('payee');
            $transaction->method = Input::get('method');
            $transaction->ref = Input::get('ref');
            $transaction->description = Input::get('description');
            $transaction->date = Input::get('date');
            $transaction->bal = Input::get('amount') + $account->balance;
            $transaction->save();
            /**
             * Let's update account.
             */

            //dd($account->account_name);
            $account->balance += Input::get('amount');
            //dd($account);
            $account->save();
            return Redirect::route('transactions.index');
        }
        return Redirect::back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     * GET /transaction/{id}
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
     * GET /transaction/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /transaction/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /transaction/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}