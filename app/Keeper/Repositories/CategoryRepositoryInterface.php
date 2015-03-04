<?php

namespace Keeper\Repositories;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Return all the expenses
     *
     * @param string $type
     * @return mixed
     */
    public function findAllExpenses($type = 'Expense');

    /**
     * Return all the incomes
     *
     * @param string $type
     * @return mixed
     */

    public function findAllIncomes($type = 'Income');
}