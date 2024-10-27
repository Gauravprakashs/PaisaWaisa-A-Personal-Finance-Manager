@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $expense_category->name }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.expense_categories.index') }}" class="btn btn-primary">
                        <span class="text">Go Back</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $expense_category->name }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
