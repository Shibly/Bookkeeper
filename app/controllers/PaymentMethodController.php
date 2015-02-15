<?php

class PaymentMethodController extends AdminController
{

    /**
     * Display a listing of the resource.
     * GET /paymentmethod
     *
     * @return Response
     */
    public function index()
    {
        $methods = Pmethod::all();
        return View::make('methods.index')->with('methods', $methods);
    }

    /**
     * Show the form for creating a new resource.
     * GET /paymentmethod/create
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * POST /paymentmethod
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validator = Validator::make($input, Pmethod::$rules);
        if ($validator->passes()) {
            $method = new Pmethod();
            $method->name = Input::get('name');
            $method->save();

            return Redirect::route('methods.index');
        }
        return Redirect::back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     * GET /paymentmethod/{id}
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
     * GET /paymentmethod/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $method = Pmethod::find($id);
        if (is_null($method)) {
            return Redirect::route('methods.index');
        }
        return View::make('methods.edit')->with('method', $method);
    }

    /**
     * Update the specified resource in storage.
     * PUT /paymentmethod/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        //dd($input);
        $validator = Validator::make($input, Pmethod::$rules);
        if ($validator->passes()) {
            Pmethod::find($id)->update($input);
            return Redirect::route('methods.index');
        }
        return Redirect::back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /paymentmethod/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Pmethod::find($id)->delete();
        return Redirect::route('methods.index');
    }

}