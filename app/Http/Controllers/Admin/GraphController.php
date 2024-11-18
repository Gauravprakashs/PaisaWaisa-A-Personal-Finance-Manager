<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;

use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    //
    public function index()
    {
        // Fetching expenses grouped by category
        $expenses = Expense::select(DB::raw('SUM(amount) as total, expense_category_id'))
            ->where('user_id', auth()->id())
            ->groupBy('expense_category_id')
            ->with('expense_category')
            ->get()
            ->map(function ($expense) {
                return [
                    'category' => $expense->expense_category->name,
                    'total' => $expense->total,
                ];
            });

        // Fetching incomes grouped by category
        $incomes = Income::select(DB::raw('SUM(amount) as total, income_category_id'))
            ->where('user_id', auth()->id())
            ->groupBy('income_category_id')
            ->with('income_category')
            ->get()
            ->map(function ($income) {
                return [
                    'category' => $income->income_category->name,
                    'total' => $income->total,
                ];
            });

        return view('admin.graphs.index', compact('expenses', 'incomes'));
    }
}
