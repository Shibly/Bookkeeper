<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/7/2015
 * Time: 2:53 AM
 */

namespace Keeper\Repositories\Eloquent;

use Keeper\Account;
use Keeper\Transaction;

use Keeper\Repositories\AccountRepositoryInterface;
use Keeper\Services\Forms\AccountForm;

class AccountRepository extends AbstractRepository implements AccountRepositoryInterface
{


    protected $transaction;


    /**
     * @param \Keeper\Account $account
     *
     */
    public function __construct(Account $account)
    {
        $this->model = $account;

    }


    /**
     * Get an array of key-value ( id=>name ) pairs of all Accounts
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
        return $this->model->orderBy($orderColumn, $orderDir)->paginate(3);
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
        $account = $this->getNew();
        $account->account_name = $data['account_name'];
        $account->description = $data['description'];
        $account->balance = $data['balance'];
        $account->save();

        $transaction = new Transaction();
        $transaction->account = $data['account_name'];
        $transaction->type = 'Transfer';
        $transaction->account = $data['account_name'];
        $transaction->payer = 'System';
        $transaction->date = date("Y/m/d");
        $transaction->description = $data['description'];
        $transaction->cr = $data['balance'];
        $transaction->bal = $data['balance'];
        $transaction->save();

        /**
         * Save the data to the transaction table as well.
         */
        return $account;
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
        $account = $this->findById($id);
        $account->account_name = $data['account_name'];
        $account->description = $data['description'];
        $account->balance = $data['balance'];
        $account->save();


        $transaction = new Transaction();
        $transaction->account = $data['account_name'];
        $transaction->type = 'Transfer';
        $transaction->account = $data['account_name'];
        $transaction->payer = 'System';
        $transaction->date = date("Y/m/d");
        $transaction->description = $data['description'];
        $transaction->cr = $data['balance'];
        $transaction->bal = $data['balance'];
        $transaction->save();
        return $account;
    }

    /**
     * Delete the specific category from the database.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $this->findById($id)->delete();
    }


    /**
     * @return \Keeper\Services\Forms\AccountForm
     */
    public function getForm()
    {
        return new AccountForm();
    }

    public function getTotalAccountBalance()
    {
        $accounts = $this->model->all();
        $res = 0;
        foreach ($accounts as $account) {
            $res += $account->balance;
        }
        return $res;
    }
}