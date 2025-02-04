@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="main-content">
    <div class="d-flex flex-wrap align-items-center mb-4">
        <div class="search w-100">
            <input placeholder="Search..." type="text" class="form-control">
        </div>
    </div>
    <hr style="border-top: 20px solid #006eff; margin: 15px 0;">

    <div class="hero">
        <div>
            <h3>Hi {{ Auth::user()->name }}</h3>
            <p>A new event has been posted, take a look!</p>
            <button class="schedule-button btn btn-primary mt-3">Add to Schedule</button>
        </div>
        <div>
            <img src="{{ asset('images/eventplanner.png') }}" alt="Hero Image">
        </div>
    </div>

    <div class="event-system">
        <button class="button ongoing-events">Ongoing Events</button>
        <button class="button upcoming-events">Upcoming Events</button>
        <button class="button attended-events">Attended Events</button>
    </div>

    <div class="previous-events">
        <h5>Previous Events</h5>
        <div class="d-flex flex-wrap">
            <div class="card card-event" style="width: 18rem;">
                <img src="{{ asset('images/timbaya.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card card-event" style="width: 18rem;">
                <img src="{{ asset('images/himamat.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card card-event" style="width: 18rem;">
                <img src="{{ asset('images/ubdays.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
