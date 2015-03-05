<?php


use Keeper\Repositories\CategoryRepositoryInterface;

class CategoryController extends \BaseController
{

    /**
     * Category repository
     *
     * @var \Keeper\Repositories\CategoryRepositoryInterface
     */
    protected $categories;


    /**
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories)
    {
        parent::__construct();
        $this->categories = $categories;
    }


    public function expense()
    {
        $expenses = $this->categories->findAllExpenses();
        return View::make('categories.expense')->with('expenses', $expenses);
    }


    public function income()
    {
        $incomes = $this->categories->findAllIncomes();
        return View::make('categories.income')->with('incomes', $incomes);
    }


    /**
     * Handle the category creation
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCategory()
    {

        $form = $this->categories->getForm();
        if (!$form->isValid()) {
            return $this->redirectRoute('expense')->withErrors($form->getErrors())->withInput();
        }
        $this->categories->create($form->getInputData());

        return $this->redirectRoute('expense');
    }


    /**
     * Show the category edit form
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */

    public function editCategory($id)
    {
        $category = $this->categories->findById($id);
        return View::make('categories.edit')->with('category', $category);
    }

    /**
     * Handle the editing of the category
     *
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */


    public function updateCategory($id)
    {
        $form = $this->categories->getForm();
        if (!$form->isValid()) {
            return $this->redirectRoute('expense')->withErrors($form->getErrors())->withInput();
        }
        $this->categories->update($id, $form->getInputData());
        return $this->redirectRoute('expense');
    }


    /**
     * Delete a category from the database
     *
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategory($id)
    {
        $this->categories->delete($id);
        return $this->redirectRoute('expense');
    }


}