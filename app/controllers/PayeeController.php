<?php

class PayeeController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /payee
     *
     * @return Response
     */
    public function index()
    {
        $payees = Payee::all();
        return View::make('payees.index')->with('payees', $payees);
    }

    /**
     * Show the form for creating a new resource.
     * GET /payee/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /payee
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validator = Validator::make($input, Payee::$rules);
        if ($validator->passes()) {
            $payee = new Payee();
            $payee->name = Input::get('name');
            $payee->save();

            return Redirect::route('payees.index');
        }
        return Redirect::back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     * GET /payee/{id}
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
     * GET /payee/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $payee = Payee::find($id);
        if (is_null($payee)) {
            return Redirect::route('payees.index');
        }
        return View::make('payees.edit')->with('payee', $payee);
    }

    /**
     * Update the specified resource in storage.
     * PUT /payee/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        //dd($input);
        $validator = Validator::make($input, Payee::$rules);
        if ($validator->passes()) {
            Payee::find($id)->update($input);
            return Redirect::route('payees.index');
        }
        return Redirect::back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /payee/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Payee::find($id)->delete();
        return Redirect::route('payees.index');
    }

}