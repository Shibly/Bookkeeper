<?php

class AdminController extends BaseController
{

    public function index()
    {
        $accounts = Account::all();

        $expenses = Transaction::where('type', '=', 'Expense')->where('date', '=', date('Y-m-d'))->get();
        $incomes = Transaction::where('type', '=', 'Income')->where('date', '=', date('Y-m-d'))->get();

        $incomes_this_month = Transaction::where(DB::raw('MONTH(created_at)'), '=', date('n'))
            ->where('type', '=', 'Income')->get();

        $expenses_this_month = Transaction::where(DB::raw('MONTH(created_at)'), '=', date('n'))
            ->where('type', '=', 'Expense')->get();

        $monthly_income = 0;
        foreach ($incomes_this_month as $income_this_month) {
            $monthly_income += $income_this_month->amount;
        }


        $monthly_expense = 0;
        foreach ($expenses_this_month as $expense_this_month) {
            $monthly_expense += $expense_this_month->amount;
        }

        $expense_today = 0;
        $income_today = 0;
        foreach ($expenses as $expense) {
            $expense_today += $expense->amount;
        }

        foreach ($incomes as $income) {
            $income_today += $income->amount;
        }

       // dd($expenses);
        return View::make('admin.index')
            ->with('accounts', $accounts)
            ->with('expense_today', $expense_today)
            ->with('income_today', $income_today)
            ->with('monthly_expense', $monthly_expense)
            ->with('monthly_income', $monthly_income);

    }
}
