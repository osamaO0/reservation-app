@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Users</h6>
                        </div>
                    </div>
                    <div class="w-content">
                        <div class="w-info">
                            <p class="value">{{$users}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-account-invoice-two">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info">
                            <div class="inv-title">
                                <h5 class="">rooms</h5>
                            </div>
                            <div class="inv-balance-info">
                                <p class="inv-balance">{{$rooms}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <div class="widget-heading">
                    <h6 class="">Bookings</h6>

                </div>
                <div class="w-chart">

                    <div class="w-chart-section total-visits-content">
                        <div class="w-detail">
                            <p class="w-title">Accepted Bookings</p>
                            <p class="w-stats">{{$acceptedBookings}}</p>
                        </div>
                    </div>


                    <div class="w-chart-section paid-visits-content">
                        <div class="w-detail">
                            <p class="w-title">Canceled Bookings</p>
                            <p class="w-stats">{{$canceledBookings}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
