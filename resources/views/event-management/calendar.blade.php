@extends('layouts.app')

@section('title', 'Event Calendar Dashboard')

@section('content')
    <div class="main-content">
        <!-- Search -->
        <div class="d-flex flex-wrap align-items-center mb-4">
            <div class="search w-100">
                <input placeholder="Search..." type="text" class="form-control">
            </div>
        </div>
        <hr style="border-top: 20px solid #006eff; margin: 15px 0;">

        <!-- Monthly Carousel -->
        <div id="monthlyCardCarousel" class="carousel slide mb-4" data-bs-ride="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center">
                        @foreach (['January', 'February', 'March', 'April', 'May', 'June'] as $month)
                            <div class="card card-calendar me-3">
                                <img src="https://fonts.gstatic.com/s/i/materialiconsoutlined/calendar_today/v7/24px.svg"
                                    alt="Month" style="width: 60px; height: 60px;">
                                <span class="title">{{ $month }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        @foreach (['July', 'August', 'September', 'October', 'November', 'December'] as $month)
                            <div class="card card-calendar me-3">
                                <img src="https://fonts.gstatic.com/s/i/materialiconsoutlined/calendar_today/v7/24px.svg"
                                    alt="Month" style="width: 60px; height: 60px;">
                                <span class="title">{{ $month }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#monthlyCardCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#monthlyCardCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Calendar -->
        <div class="calendar-container">
            <div class="month">
                <ul>
                    <li class="prev">&#10094;</li>
                    <li class="next">&#10095;</li>
                    <li><br><span style="font-size:18px"></span></li>
                </ul>
            </div>

            <ul class="weekdays">
                @foreach (['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                    <li>{{ $day }}</li>
                @endforeach
            </ul>

            <ul class="days">
                @for ($i = 1; $i <= 31; $i++)
                    <li>{{ $i }}</li>
                @endfor
            </ul>
        </div>

        <!-- Events Section -->
        <div class="event-container">
            <div class="row">
                <!-- Cards Section -->
                <div class="col-lg-8 d-flex">
                    @foreach (['himamat.png', 'event2.png', 'event3.png'] as $eventImage)
                        <div class="card card-calendar me-2" style="width: 18rem;">
                            <div class="card-body">
                                <img src="{{ asset('images/' . $eventImage) }}" class="card-img-top" alt="Event Image">
                                <h5 class="card-title">Event Title</h5>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Table Section -->
                <div class="col-lg-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Event Month</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>January</td>
                                <td>January 25, 2025 | 10:00 AM</td>
                                <td><button class="btn btn-info">View Details</button></td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>February 15, 2025 | 2:00 PM</td>
                                <td><button class="btn btn-info">View Details</button></td>
                            </tr>
                            <tr>
                                <td>March</td>
                                <td>March 30, 2025 | 5:00 PM</td>
                                <td><button class="btn btn-info">View Details</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
