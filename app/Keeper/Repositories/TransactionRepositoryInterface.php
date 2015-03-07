<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/7/2015
 * Time: 11:27 PM
 */

namespace Keeper\Repositories;


interface TransactionRepositoryInterface
{

    public function getAll();

    public function create(array $data);

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc');
}