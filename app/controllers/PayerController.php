<?php

class PayerController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /payer
     *
     * @return Response
     */
    public function index()
    {
        $payers = Payer::all();
        return View::make('payers.index')->with('payers', $payers);
    }

    /**
     * Show the form for creating a new resource.
     * GET /payer/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /payer
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validator = Validator::make($input, Payer::$rules);
        if ($validator->passes()) {
            $payer = new Payer();
            $payer->name = Input::get('name');
            $payer->save();

            return Redirect::route('payers.index');
        }
        return Redirect::back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     * GET /payer/{id}
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
     * GET /payer/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $payer = Payer::find($id);
        if (is_null($payer)) {
            return Redirect::route('payers.index');
        }
        return View::make('payers.edit')->with('payer', $payer);
    }

    /**
     * Update the specified resource in storage.
     * PUT /payer/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        //dd($input);
        $validator = Validator::make($input, Payer::$rules);
        if ($validator->passes()) {
            Payer::find($id)->update($input);
            return Redirect::route('payers.index');
        }
        return Redirect::back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /payer/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Payer::find($id)->delete();
        return Redirect::route('payers.index');
    }

}