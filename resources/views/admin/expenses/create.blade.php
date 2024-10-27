@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Create expense') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.expenses.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.expenses.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="expense_category_id">Expense Category</label>
                                <select name="expense_category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($expense_categories as $id => $expense_category)
                                        <option value="{{ $id }}">{{ $expense_category }}</option>
                                    @endforeach
                                </select>
                                @error('expense_category_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="entry_date">entry date</label>
                                <input class="form-control" id="entry_date" type="date" name="entry_date" value="{{ old('entry_date') }}">
                                @error('entry_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input class="form-control" id="amount" type="number" name="amount" value="{{ old('amount') }}">
                                @error('amount')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-4">
                        <button class="btn btn-primary" type="submit" name="submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
