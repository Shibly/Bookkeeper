<?php


namespace Keeper\Repositories\Eloquent;

use Keeper\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Keeper\Repositories\CategoryRepositoryInterface;
use Keeper\Exception\CategoryNotFoundException;
use Keeper\Services\Forms\CategoryForm;


class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{


    /**
     * Create a new DBCategoryRepository instance
     *
     * @param \Keeper\Category $category
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Get an array of key-value ( id=>name ) pairs of all categories
     * @return array
     */
    public function listAll()
    {
        $categories = $this->model->lists('name', 'id');
        return $categories;
    }

    /**
     * @param string $orderColumn
     * @param string $orderDir
     * @return mixed
     */
    public function findAll($orderColumn = 'created_at', $orderDir = 'desc')
    {
        $categories = $this->model
            ->orderBy($orderColumn, $orderDir)
            ->get();
        return $categories;
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

        $category = $this->getNew();
        $category->name = $data['name'];
        $category->type = $data['type'];
        $category->save();

        return $category;
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
        $category = $this->findById($id);
        $category->name = $data['name'];
        $category->type = $data['type'];
        $category->save();
        return $category;

    }

    /**
     * Delete the specific category from the database.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $category = $this->findById($id);
        $category->delete();
    }

    public function helloWorld()
    {
        echo "Hi, you have called me from the repository class and it's AWESOME !";
    }


    /**
     * Return all the expenses
     *
     * @param string $type
     * @return mixed
     */
    public function findAllExpenses($type = 'Expense')
    {
        return $this->model->where('type', '=', $type)->get();

    }

    /**
     * Return all the incomes
     *
     * @param string $type
     * @return mixed
     */
    public function findAllIncomes($type = 'Income')
    {
        return $this->model->where('type', '=', $type)->get();
    }


    /**
     * Get the category create/update form service
     *
     * @return \Keeper\Services\Forms\CategoryForm
     */
    public function getForm()
    {
        return new CategoryForm;
    }
}