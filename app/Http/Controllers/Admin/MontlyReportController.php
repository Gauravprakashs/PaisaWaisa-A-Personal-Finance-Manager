<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MontlyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        $from    = Carbon::parse(sprintf(
            '%s-%s-01',
            $r->query('y', Carbon::now()->year),
            $r->query('m', Carbon::now()->month)
        ));

        $to      = clone $from;
        $to->day = $to->daysInMonth;

        $exp_q = Expense::whereUserId(auth()->id())->with('expense_category')
            ->whereBetween('entry_date', [$from, $to]);

        $inc_q = Income::whereUserId(auth()->id())->with('income_category')
            ->whereBetween('entry_date', [$from, $to]);

        $exp_total = $exp_q->sum('amount');
        $inc_total = $inc_q->sum('amount');
        $exp_group = $exp_q->orderBy('amount', 'desc')->get()->groupBy('expense_category_id');
        $inc_group = $inc_q->orderBy('amount', 'desc')->get()->groupBy('income_category_id');
        $profit    = $inc_total - $exp_total;

        $exp_summary = [];
        foreach ($exp_group as $exp) {
            foreach ($exp as $line) {
                if (! isset($exp_summary[$line->expense_category->name])) {
                    $exp_summary[$line->expense_category->name] = [
                        'name'   => $line->expense_category->name,
                        'amount' => 0,
                    ];
                }
                $exp_summary[$line->expense_category->name]['amount'] += $line->amount;
            }
        }

        $inc_summary = [];
        foreach ($inc_group as $inc) {
            foreach ($inc as $line) {
                if (! isset($inc_summary[$line->income_category->name])) {
                    $inc_summary[$line->income_category->name] = [
                        'name'   => $line->income_category->name,
                        'amount' => 0,
                    ];
                }
                $inc_summary[$line->income_category->name]['amount'] += $line->amount;
            }
        }

        return view('admin.monthly_reports.index', compact(
            'exp_summary',
            'inc_summary',
            'exp_total',
            'inc_total',
            'profit'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
