<?php

namespace App\Http\Controllers\Admin;

use App\Models\IncomeCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IncomeCategoryRequest;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income_categories = IncomeCategory::whereUserId(auth()->id())->latest()->paginate(5);

        return view('admin.income_categories.index', compact('income_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.income_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncomeCategoryRequest $request)
    {
        IncomeCategory::create($request->validated() + ['user_id' => auth()->id()]);

        return redirect()->route('admin.income_categories.index')->with([
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
    public function show(IncomeCategory $income_category)
    {
        return view('admin.income_categories.show', compact('income_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeCategory $income_category)
    {
        return view('admin.income_categories.edit', compact('income_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncomeCategoryRequest $request,IncomeCategory $income_category)
    {
        $income_category->update($request->validated() + ['user_id' => auth()->id()]);

        return redirect()->route('admin.income_categories.index')->with([
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
    public function destroy(IncomeCategory $income_category)
    {
        $income_category->delete();

        return redirect()->back()->with([
            'message' => 'success deleted !',
            'alert-info' => 'danger'
        ]);
    }
}
