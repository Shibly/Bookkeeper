<?php

use Keeper\Repositories\PaymentRepositoryInterface;

class PaymentMethodController extends \BaseController
{

    /**
     * Category repository
     *
     * @var \Keeper\Repositories\CategoryRepositoryInterface
     */


    protected $payments;

    /**
     * @param PaymentRepositoryInterface $payments
     */
    public function __construct(PaymentRepositoryInterface $payments)
    {
        $this->payments = $payments;
    }

    /**
     * Display a listing of the resource.
     * GET /PaymentMethods
     *
     * @return Response
     */
    public function index()
    {
        $methods = $this->payments->findAll();
        return View::make('methods.index')->with('methods', $methods);
    }

    /**
     * Store a newly created resource in storage.
     * POST /PaymentMethod
     *
     * @return Response
     */
    public function store()
    {
        $form = $this->payments->getForm();
        if (!$form->isValid()) {
            return $this->redirectRoute('methods.index')->withErrors($form->GetErrors())->withInput();
        }
        $this->payments->create($form->getInputData());
        return $this->redirectRoute('methods.index');

    }


    /**
     * Show the form for editing the specified resource.
     * GET /PaymentMethod/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $method = $this->payments->findById($id);
        return View::make('methods.edit')->with('method', $method);
    }

    /**
     * Update the specified resource in storage.
     * PUT /PaymentMethod/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $form = $this->payments->getForm();
        if (!$form->isValid()) {
            return $this->redirectRoute('methods.index')->withErrors($form->GetErrors())->withInput();
        }
        $this->payments->update($id, $form->getInputData());
        return $this->redirectRoute('methods.index');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /PaymentMethod/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->payments->delete($id);
        return Redirect::route('methods.index');
    }

}