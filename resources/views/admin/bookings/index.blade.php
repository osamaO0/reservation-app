@extends('layouts.admin')

@section('title', 'Bookings')

@section('css')
<link href="{{ asset('admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="row">
    <div id="tabsAlignments" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area justify-tab">

                <ul class="nav nav-tabs  mb-3 mt-3 nav-fill" id="justifyTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="justify-home-tab" data-toggle="tab" href="#justify-home" role="tab" aria-controls="justify-home" aria-selected="true">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="justify-profile-tab" data-toggle="tab" href="#justify-profile" role="tab" aria-controls="justify-profile" aria-selected="false">Accepted</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="justify-contact-tab" data-toggle="tab" href="#justify-contact" role="tab" aria-controls="justify-contact" aria-selected="false">Rejected</a>
                    </li>
                </ul>

                <div class="tab-content" id="justifyTabContent">
                    <div class="tab-pane fade show active" id="justify-home" role="tabpanel" aria-labelledby="justify-home-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">room</th>
                                    <th scope="col">user</th>
                                    <th scope="col">start date</th>
                                    <th scope="col">end date</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingBookings as $booking)
                                <tr>
                                    <td>{{ $booking->bookable_type }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->start_date }}</td>
                                    <td>{{ $booking->end_date }}</td>
                                    <td>{{ $booking->status }}</td>
                                    <td>
                                        <a href="{{ route('bookings.accept', $booking->id) }}" class="btn btn-success">Accept</a>
                                        <a href="{{ route('bookings.reject', $booking->id) }}" class="btn btn-danger">Reject</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="justify-profile" role="tabpanel" aria-labelledby="justify-profile-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">room</th>
                                    <th scope="col">user</th>
                                    <th scope="col">start date</th>
                                    <th scope="col">end date</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acceptedBookings as $acceptedBooking)
                                <tr>
                                    <td>{{ $acceptedBooking->bookable_type }}</td>
                                    <td>{{ $acceptedBooking->user->name }}</td>
                                    <td>{{ $acceptedBooking->start_date }}</td>
                                    <td>{{ $acceptedBooking->end_date }}</td>
                                    <td>{{ $acceptedBooking->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="justify-contact" role="tabpanel" aria-labelledby="justify-contact-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">room</th>
                                    <th scope="col">user</th>
                                    <th scope="col">start date</th>
                                    <th scope="col">end date</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rejectedBookings as $rejectedBooking)
                                <tr>
                                    <td>{{ $rejectedBooking->bookable_type }}</td>
                                    <td>{{ $rejectedBooking->user->name }}</td>
                                    <td>{{ $rejectedBooking->start_date }}</td>
                                    <td>{{ $rejectedBooking->end_date }}</td>
                                    <td>{{ $rejectedBooking->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
<script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
@endsection
