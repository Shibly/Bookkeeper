<?php

class AdminController extends BaseController
{

    public function index()
    {

        $income_this_month = Transaction::where(DB::raw('MONTH(created_at)'), '=', date('n'))->get();
        return View::make('admin.index')->with('income_this_month', $income_this_month);
    }
}
