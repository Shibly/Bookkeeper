<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/6/2015
 * Time: 12:28 AM
 */

namespace Keeper\Repositories\Eloquent;

use Keeper\PaymentMethod;
use Keeper\Services\Forms\PaymentMethodForm;
use Keeper\Repositories\PaymentRepositoryInterface;

class PaymentRepository extends AbstractRepository implements PaymentRepositoryInterface
{


    /**
     * Create a new DBPaymentMethodRepository instance
     * @param \Keeper\PaymentMethod $paymentMethod
     */
    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->model = $paymentMethod;
    }

    /**
     * Get an array of key-value ( id=>name ) pairs of all categories
     * @return array
     */
    public function listAll()
    {
        return $this->model->lists('name', 'id');
    }

    /**
     * @param string $orderColumn
     * @param string $orderDir
     * @return mixed
     */
    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        return $this->model->orderBy($orderColumn, $orderDir)->get();
    }

    /**
     * Find a PaymentMethod by id
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new PaymentMethod in the database
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $paymentMethod = $this->getNew();
        $paymentMethod->name = $data['name'];
        $paymentMethod->save();
        return $paymentMethod;
    }

    /**
     * Update the specific PaymentMethod in the database
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $paymentMethod = $this->findById($id);
        $paymentMethod->name = $data['name'];
        $paymentMethod->save();
        return $paymentMethod;
    }

    /**
     * Delete the specific PaymentMethod from the database.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $this->findById($id)->delete();
    }

    /**
     * Get the payer create/update form service
     *
     * @return \Keeper\Services\Forms\PaymentMethodForm
     */
    public function getForm()
    {
        return new PaymentMethodForm();
    }
}