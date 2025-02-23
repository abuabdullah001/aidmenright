@extends('admin.masterTemplate')

@section('main-content')
    @php
        $volunteer = App\Models\Volunteer::all();
        $volunteerRequest = App\Models\VolunteerTerm::where('status', 'pending')->get();
        $donation = App\Models\Order::all();
        $sponsor = App\Models\Doante::all();
        $event = App\Models\Event::all();
        $project = App\Models\Project::all();
        $champagin = App\Models\champaign::all();
        $expense = App\Models\Expense::sum('amount');
        $today = Carbon\Carbon::now();
        $todayTransaction = App\Models\Order::whereDate('created_at', $today)->get();
    @endphp

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">DASHBOARD</h5>
                    </div>
                </div>
            </div>
            <hr class="style18">
        </div>

        @if (Auth::user()->type == 1)
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Volunteer Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-info elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <i class="fas fa-user-friends fa-lg"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">All Volunteer</span>
                                    <span class="info-box-number">{{ $volunteer->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Volunteer Request Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-success elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <i class="fas fa-user-plus fa-lg"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Volunteer Request</span>
                                    <span class="info-box-number">{{ $volunteerRequest->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Total Donation Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-danger elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <i class="fas fa-donate fa-lg"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Donation</span>
                                    <span class="info-box-number">{{ $donation->sum('amount') }} Tk</span>
                                </div>
                            </div>
                        </div>
                        <!-- Monthly Donation Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-danger elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <img width="64" height="64" src="https://img.icons8.com/wired/64/currency.png"
                                        alt="currency" />
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Monthly Donation</span>
                                    <span class="info-box-number">{{ $donation->sum('amount') }} Tk</span>
                                </div>
                            </div>
                        </div>

                        <!-- Today's Donation Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-warning elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <i class="fas fa-calendar-check fa-lg"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Today's Donation</span>
                                    <span class="info-box-number">{{ $todayTransaction->sum('amount') }} Tk</span>
                                </div>
                            </div>
                        </div>

                        <!-- Total Sponsor Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-fuchsia elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <i class="fas fa-gift fa-lg"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Sponsor</span>
                                    <span class="info-box-number">{{ $sponsor->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Total Event Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-fuchsia elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Event</span>
                                    <span class="info-box-number">{{ $event->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Total Campaign Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-fuchsia elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <i class="fas fa-cogs fa-lg"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Champaign</span>
                                    <span class="info-box-number">{{ $champagin->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Total Project Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-fuchsia elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <i class="fas fa-briefcase fa-lg"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Project</span>
                                    <span class="info-box-number">{{ $project->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- running Project Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-fuchsia elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <img width="50" height="50"
                                        src="https://img.icons8.com/ios-filled/50/project.png" alt="project" />
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Running Project</span>
                                    <span class="info-box-number">{{ $project->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Completed Project Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-fuchsia elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <img width="80" height="80"
                                        src="https://img.icons8.com/dotty/80/project-management.png"
                                        alt="project-management" /> </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Completed Project</span>
                                    <span class="info-box-number">{{ $project->count() }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Total Expense Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-danger elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <i class="fas fa-money-bill-alt fa-lg"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Expense</span>
                                    <span class="info-box-number">{{ $expense }} Tk</span>
                                </div>
                            </div>
                        </div>
                        <!-- Monthly Expense Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-danger elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <img width="80" height="80" src="https://img.icons8.com/dotty/80/tax.png"
                                        alt="tax" /> </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Monthly Expense</span>
                                    <span class="info-box-number">{{ $expense }} Tk</span>
                                </div>
                            </div>
                        </div>
                        @php

                            $sponsar_deu = App\Models\Billing::where('status', 'not_paid');

                        @endphp
                         <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-danger elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <img width="64" height="64"
                                        src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-sponsor-business-flaticons-lineal-color-flat-icons.png"
                                        alt="external-sponsor-business-flaticons-lineal-color-flat-icons" /> </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Sponsor Deu Amount</span>
                                    <span class="info-box-number">{{   $sponsar_deu->sum('amount') }} Tk</span>
                                </div>
                            </div>
                        </div>
                        @php

                            $sponsar = App\Models\Billing::where('status', 'paid');

                        @endphp
                        <!-- Monthly sponsor receive Section -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span
                                    class="info-box-icon bg-danger elevation-1 d-flex justify-content-center align-items-center"
                                    style="height: 70px; width: 70px;">
                                    <img width="64" height="64"
                                        src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-sponsor-live-streaming-flaticons-lineal-color-flat-icons.png"
                                        alt="external-sponsor-live-streaming-flaticons-lineal-color-flat-icons" /> </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Sponsor Receive Amount</span>
                                    <span class="info-box-number">{{ $sponsar->sum('paid_amount') }} Tk</span>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </section>
        @endif
        @if (Auth::user()->type == 100)
            <section class="content">
                <div class="container-fluid">
                    <h1 class="text-center">Welcome {{ auth()->user()->name }}</h1>
                </div>
            </section>
        @endif
    </div>
@endsection
