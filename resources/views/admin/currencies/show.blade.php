@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $currency->name }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.currencies.index') }}" class="btn btn-primary">
                        <span class="text">Go Back</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $currency->name }}</td>
                        <th>Symbol</th>
                        <td>{{ $currency->symbol }}</td>
                    </tr>
                    <tr>
                        <th>Money Format Thousands</th>
                        <td>{{ $currency->money_format_thousands }}</td>
                        <th>Money Format Decimal</th>
                        <td>{{ $currency->money_format_decimal }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
