<?php

use Keeper\Repositories\PayeeRepositoryInterface;

class PayeeController extends \BaseController
{

    /**
     * Payee Repository
     * @var /Keeper/Repositories/PayeeRepositoryInterface
     */

    protected $payees;

    /**
     * @param PayeeRepositoryInterface $payees
     */

    public function __construct(PayeeRepositoryInterface $payees)
    {
        $this->payees = $payees;
    }


    /**
     * Display a listing of the resource.
     * GET /payee
     *
     * @return Response
     */
    public function index()
    {
        $payees = $this->payees->findAll();
        return View::make('payees.index')->with('payees', $payees);
    }


    /**
     * Store a newly created resource in storage.
     * POST /payee
     *
     * @return Response
     */
    public function store()
    {

        $form = $this->payees->getForm();
        if (!$form->isValid()) {
            return $this->redirectRoute('payees.index')->withErrors($form->getErrors())->withInput();
        }
        $this->payees->create($form->getInputData());
        return $this->redirectRoute('payees.index');

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
        $payee = $this->payees->findById($id);
        return View::make('payees.edit')->with('payee', $payee);
    }

    /**
     * Update the specified resource in storage.
     * PUT /payee/{id}
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $form = $this->payees->getForm();
        if (!$form->isValid()) {
            return $this->redirectRoute('payees.index')->withErrors($form->getErrors())->withInput();
        }
        $this->payees->update($id, $form->getInputData());
        return $this->redirectRoute('payees.index');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /payee/{id}
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->payees->delete($id);
        return $this->redirectRoute('payees.index');
    }

}