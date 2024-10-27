<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExpenseCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExpenseCategoryRequest;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_categories = ExpenseCategory::whereUserId(auth()->id())->latest()->paginate(5);

        return view('admin.expense_categories.index', compact('expense_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expense_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseCategoryRequest $request)
    {
        ExpenseCategory::create($request->validated() + ['user_id' => auth()->id()]);

        return redirect()->route('admin.expense_categories.index')->with([
            'message' => 'success created !',
            'alert-info' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expense_category)
    {
        return view('admin.expense_categories.show', compact('expense_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseCategory $expense_category)
    {
        return view('admin.expense_categories.edit', compact('expense_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseCategoryRequest $request,ExpenseCategory $expense_category)
    {
        $expense_category->update($request->validated() + ['user_id' => auth()->id()]);

        return redirect()->route('admin.expense_categories.index')->with([
            'message' => 'success updated !',
            'alert-info' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseCategory $expense_category)
    {
        $expense_category->delete();

        return redirect()->back()->with([
            'message' => 'success deleted !',
            'alert-info' => 'danger'
        ]);
    }
}
