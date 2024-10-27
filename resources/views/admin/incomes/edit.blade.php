@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Edit income') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.incomes.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.incomes.update', $income) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="income_category_id">income Category</label>
                                <select name="income_category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($income_categories as $id => $income_category)
                                        <option {{ $income->income_category_id == $id ? 'selected' : null }} value="{{ $id }}">{{ $income_category }}</option>
                                    @endforeach
                                </select>
                                @error('income_category_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="entry_date">entry date</label>
                                <input class="form-control" id="entry_date" type="date" name="entry_date" value="{{ old('entry_date', $income->entry_date) }}">
                                @error('entry_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input class="form-control" id="amount" type="number" name="amount" value="{{ old('amount', $income->amount) }}">
                                @error('amount')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $income->description) }}</textarea>
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
