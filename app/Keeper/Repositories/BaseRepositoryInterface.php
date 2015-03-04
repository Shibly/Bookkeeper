<?php
/**
 * Created by PhpStorm.
 * User: Shibly
 * Date: 3/4/2015
 * Time: 11:13 PM
 */

namespace Keeper\Repositories;


interface BaseRepositoryInterface
{
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