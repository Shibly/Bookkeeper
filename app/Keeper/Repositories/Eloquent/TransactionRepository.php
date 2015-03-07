<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/7/2015
 * Time: 3:34 AM
 */

namespace Keeper\Repositories\Eloquent;

use Keeper\Transaction;
use Keeper\Repositories\TransactionRepositoryInterface;

class TransactionRepository extends AbstractRepository implements TransactionRepositoryInterface
{


    public function __construct(Transaction $transaction)
    {
        $this->model = $transaction;

    }

    public function create(array $data)
    {
        $transaction = $this->getNew();
        $transaction->account = $data['account'];
        $transaction->type = $data['type'];
        $transaction->category = $data['category'];
        $transaction->amount = $data['amount'];
        $transaction->payer = $data['payer'];
        $transaction->payee = $data['payee'];
        $transaction->method = $data['method'];
        $transaction->ref = $data['ref'];
        $transaction->description = $data['description'];
        $transaction->status = 'Cleared';
    }

    public function getAll()
    {

    }

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        return $this->model->orderBy($orderColumn, $orderDir)->paginate(10);
    }
}