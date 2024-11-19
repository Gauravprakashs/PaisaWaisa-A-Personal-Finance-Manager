@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Users Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow-lg h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">101</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Income Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-orange shadow-lg h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">Total Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">*****</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-orange"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Expenses Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-red shadow-lg h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expenses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">*****</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Balance Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-yellow shadow-lg h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-yellow text-uppercase mb-1">Total Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">*****</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-yellow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Content Row -->

    <!-- Carousel Example -->
    <div class="row mb-4">
        <div class="col-12">
            <div id="dashboardCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.analyticssteps.com/backend/media/thumbnail/8331994/8586366_1604483626_icons.jpg" class="d-block w-100" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Welcome to Your Dashboard</h5>
                            <p>Keep track of all your expenses and income efficiently!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.analyticssteps.com/backend/media/thumbnail/8331994/8586366_1604483626_icons.jpg" class="d-block w-100" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Track Your Transactions</h5>
                            <p>Manage and analyze your income and expenses in real-time.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.shutterstock.com/image-illustration/personal-finance-infographics-design-timeline-260nw-1597883872.jpg" class="d-block w-100" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>See Detailed Reports</h5>
                            <p>Get comprehensive insights into your financial status.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#dashboardCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#dashboardCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- End Carousel -->

</div>

@endsection

<!-- Add Custom CSS for better styling -->
@section('styles')
<style>
    /* General body styling */
    body {
        background-color:#ff6347; /* Light gray background to make the content stand out */
        color: #333; /* Dark text color for readability */
        font-family: Arial, sans-serif; /* Choose a clean, modern font */
    }

    .card-body {
        padding: 2rem;
    }

    .h5, .h3 {
        font-weight: bold;
    }

    .carousel-item img {
        height: 300px;
        object-fit: cover;
    }

    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
    }

    /* Add warm colors and box-shadow */
    .shadow-lg {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1), 0px 8px 16px rgba(0, 0, 0, 0.2);
    }

    .border-left-warning {
        border-left: 5px solid #ffcc00; /* Warm Yellow */
    }

    .border-left-orange {
        border-left: 5px solid #ff7f50; /* Warm Orange */
    }

    .border-left-red {
        border-left: 5px solid #ff6347; /* Warm Red */
    }

    .border-left-yellow {
        border-left: 5px solid #f0e68c; /* Light Yellow */
    }

    .text-warning {
        color: #ffcc00 !important; /* Warm Yellow */
    }

    .text-orange {
        color: #ff7f50 !important; /* Warm Orange */
    }

    .text-danger {
        color: #ff6347 !important; /* Warm Red */
    }

    .text-yellow {
        color: #f0e68c !important; /* Light Yellow */
    }

    /* Background Color for Site */
    .container-fluid {
        background-color: #fff; /* White background for the main content area */
        padding-top: 30px; /* Add some spacing from the top */
        padding-bottom: 30px; /* Add some spacing at the bottom */
    }

    .navbar {
        background-color: #ff7f50; /* Warm Orange for the navbar */
        color: white; /* White text on the navbar */
    }

    .footer {
        background-color: #ff6347; /* Warm Red for the footer */
        color: white; /* White text on the footer */
    }

    /* Additional Styling for Cards */
    .card {
        background-color: #fff; /* Card background in white for contrast */
        border-radius: 8px; /* Rounded corners for a soft look */
        overflow: hidden; /* Ensures no content overflows */
    }
</style>

@endsection
