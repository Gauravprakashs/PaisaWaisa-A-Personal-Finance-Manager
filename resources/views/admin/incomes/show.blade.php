@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $income->income_category->name }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.incomes.index') }}" class="btn btn-primary">
                        <span class="text">Go Back</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $income->income_category->name }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $income->description }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
