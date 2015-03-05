<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/5/2015
 * Time: 10:21 PM
 */

namespace Keeper\Repositories\Eloquent;

use Keeper\Payer;
use Keeper\Repositories\PayerRepositoryInterface;
use Keeper\Services\Forms\PayerForm;

class PayerRepository extends AbstractRepository implements PayerRepositoryInterface
{

    /**
     * Create a new DBPayerRepository instance
     * @param \Keeper\Payer $payer
     */

    public function __construct(Payer $payer)
    {
        $this->model = $payer;

    }


    /**
     * Get an array of key-value ( id=>name ) pairs of all payers
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
        $payers = $this->model
            ->orderBy($orderColumn, $orderDir)
            ->get();
        return $payers;
    }

    /**
     * Find a payer by id
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new payer in the database
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $payer = $this->getNew();
        $payer->name = $data['name'];
        $payer->save();
        return $payer;
    }

    /**
     * Update the specific payer in the database
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $payer = $this->findById($id);
        $payer->name = $data['name'];
        $payer->save();
        return $payer;

    }

    /**
     * Delete the specific payer from the database.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $payer = $this->findById($id);
        $payer->delete();
    }


    /**
     * Get the payer create/update form service
     *
     * @return \Keeper\Services\Forms\PayerForm
     */

    public function getForm()
    {
        return new PayerForm();
    }
}