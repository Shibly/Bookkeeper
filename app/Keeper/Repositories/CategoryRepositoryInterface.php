<?php

namespace Keeper\Repositories;

interface CategoryRepositoryInterface
{

    public function helloWorld();

    /**
     * Get an array of key-value ( id=>name ) pairs of all categories
     * @return array
     */
    public function listAll();


    /**
     * @param string $orderColumn
     * @param string $orderDir
     * @return mixed
     */

    public function findAll($orderColumn = 'created_at', $orderDir = 'desc');

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


    /**
     * Find a category by id
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Create a new category in the database
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update the specific category in the database
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);


    /**
     * Delete the specific category from the database.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}