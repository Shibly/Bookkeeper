<?php

class CategoryController extends AdminController
{

    public function expense()
    {
        $expenses = Category::where('type', '=', 'Expense')->get();
        return View::make('categories.expense')->with('expenses', $expenses);
    }


    public function income()
    {
        $incomes = Category::where('type', '=', 'Income')->get();
        return View::make('categories.income')->with('incomes', $incomes);
    }


    public function postCategory()
    {
        $input = Input::all();
        $validator = Validator::make($input, Category::$rules);
        if ($validator->passes()) {
            $category = new Category();
            $category->name = Input::get('name');
            $category->type = Input::get('type');
            $category->save();
            return Redirect::route('expense');
        }
        return Redirect::back()->withErrors($validator);
    }


    public function editCategory($id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return Redirect::route('expense');
        }
        return View::make('categories.edit')->with('category', $category);
    }


    public function updateCategory($id)
    {
        $input = array_except(Input::all(), '_method');
        $validator = Validator::make($input, Category::$rules);
        if ($validator->passes()) {
            Category::find($id)->update($input);
            return Redirect::route('expense');
        }
        return Redirect::back()->withErrors($validator);
    }


    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return Redirect::route('expense');
    }


}