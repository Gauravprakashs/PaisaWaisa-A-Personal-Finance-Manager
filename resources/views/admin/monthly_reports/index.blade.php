@extends('layouts.admin')

@section('content')

    <div class="container">
        <h3 class="page-title ">Monthly Report</h3>

        <form  method="get">
            <div class="row">
                <div class="col-xs-1 col-md-4 form-group">
                <label for="year">Year</label>
                @php
                    $years = collect(range(1, -2))->map(function ($item) {
                    return (string) date('Y') - $item;
                });
                    $months = cal_info(0)['months'];
                @endphp
                <select name="y" class="form-control" id="y">
                @foreach($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
                </select>
                </div>
                <div class="col-xs-2 col-md-4 form-group">
                <label for="month">Month</label>
                <select name="m" class="form-control" id="y">
                @foreach($months as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                @endforeach
                </select>
                </div>
                <div class="col-xs-4">
                    <label class="control-label">&nbsp;</label><br>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>

            <div class="row">
                <div class="col-xs-1 col-md-1 form-group">
                </div>
                <div class="col-xs-2 col-md-2 form-group">
                </div>
                <div class="col-xs-4">
                    <label class="control-label">&nbsp;</label><br>
                </div>
            </div>

        <div class="card p-3">
            <div class="card-heading">
                Report
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Income</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($inc_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                            <tr>
                                <th>Expenses</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($exp_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                            <tr>
                                <th>Profit</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($profit, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Income by category</th>
                                <th>{{ auth()->user()->currency->symbol . ' ' . number_format($inc_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</th>
                            </tr>
                        @foreach($inc_summary as $inc)
                            <tr>
                                <th>{{ $inc['name'] }}</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($inc['amount'], 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Expenses by category</th>
                                <th>{{ auth()->user()->currency->symbol . ' ' . number_format($exp_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</th>
                            </tr>
                        @foreach($exp_summary as $inc)
                            <tr>
                                <th>{{ $inc['name'] }}</th>
                                <td>{{ auth()->user()->currency->symbol . ' ' . number_format($inc['amount'], 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop