@extends('layouts.app')

@section('title', 'Attendance')

@section('content')
    <div class="main-content">
        <div class="d-flex flex-wrap align-items-center mb-4">
            <div class="search w-100">
                <input placeholder="Search..." type="text" class="form-control">
                <!--  <button type="submit" class="btn btn-primary mt-2">Go</button> -->
            </div>
        </div>
        <hr style="border-top: 20px solid #006eff; margin: 15px 0;">


        <!-- Attendance -->
        <div class="attendance-box mt-4 p-3">
            <h5>Attendance</h5>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Check-in Time</th>
                        <th>Check-out Time</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->event_name }}</td>
                        <td>{{ $event->event_location }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->check_in_time }}</td>
                        <td>{{ $event->check_out_time }}</td>
                        <td><button class="btn btn-info btn-sm">View</button></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>



        <!-- New Event Box -->
        <div class="event-box mt-4 p-3">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('images/himamat.png')}}" alt="Event Image" class="img-fluid rounded">
                </div>
                <div class="col-md-8">
                    <h5>
                        <i class="fas fa-check-circle"></i> Event Title
                    </h5>
                    <p class="event-description">This is a short description of the event. It gives an overview
                        of the activities and what participants can expect.</p>
                    <button class="btn btn-info">Surveys</button>
                </div>
            </div>
        </div>

    </div>
@endsection
