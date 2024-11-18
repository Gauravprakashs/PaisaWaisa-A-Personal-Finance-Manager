@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Expense vs Income Graphs</h2>

    <!-- Row for Graphs -->
    <div class="row justify-content-center">
        <!-- Expense Chart -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5>Expenses by Category</h5>
                </div>
                <div class="card-body">
                    <canvas id="expenseChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Income Chart -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5>Income by Category</h5>
                </div>
                <div class="card-body">
                    <canvas id="incomeChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data for Expense Chart
    const expenseData = {
        labels: {!! json_encode($expenses->pluck('category')) !!},
        datasets: [{
            label: 'Expenses by Category',
            data: {!! json_encode($expenses->pluck('total')) !!},
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
        }]
    };

    // Data for Income Chart
    const incomeData = {
        labels: {!! json_encode($incomes->pluck('category')) !!},
        datasets: [{
            label: 'Income by Category',
            data: {!! json_encode($incomes->pluck('total')) !!},
            backgroundColor: ['#4BC0C0', '#9966FF', '#FF9F40'],
        }]
    };

    // Configuration for Expense Chart
    const configExpense = {
        type: 'pie',
        data: expenseData,
    };

    // Configuration for Income Chart
    const configIncome = {
        type: 'bar',
        data: incomeData,
    };

    // Rendering the charts
    new Chart(document.getElementById('expenseChart'), configExpense);
    new Chart(document.getElementById('incomeChart'), configIncome);
</script>

@endsection
