<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/4/2015
 * Time: 11:17 PM
 */

namespace Keeper\Repositories\Eloquent;

use Keeper\Payee;
use Keeper\Repositories\PayeeRepositoryInterface;
use Keeper\Services\Forms\PayeeForm;

class PayeeRepository extends AbstractRepository implements PayeeRepositoryInterface
{

    /**
     * Create a new DBPayeeRepository instance
     * @param \Keeper\Payee $payee
     */

    public function __construct(Payee $payee)
    {
        $this->model = $payee;

    }

    /**
     * Get an array of key-value ( id=>name ) pairs of all categories
     * @return array
     */
    public function listAll()
    {
        $payees = $this->model->lists('name', 'id');
        return $payees;
    }

    /**
     * @param string $orderColumn
     * @param string $orderDir
     * @return mixed
     */
    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        $payees = $this->model
            ->orderBy($orderColumn, $orderDir)
            ->get();
        return $payees;

    }

    /**
     * Find a category by id
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new category in the database
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $payee = $this->getNew();
        $payee->name = $data['name'];
        $payee->save();
        return $payee;
    }

    /**
     * Update the specific category in the database
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $payee = $this->findById($id);
        $payee->name = $data['name'];
        $payee->save();
        return $payee;
    }

    /**
     * Delete the specific category from the database.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $payee = $this->findById($id);
        $payee->delete();
    }


    /**
     * Get the category create/update form service
     *
     * @return \Keeper\Services\Forms\PayeeForm
     */

    public function getForm()
    {
        return new PayeeForm();
    }
}