<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        return view('event-management.home', compact('user'));
    }

    public function calendar()
    {
        $user = Auth::user();
        return view('event-management.calendar', compact('user'));
    }

    public function attendance()
    {
        $user = Auth::user();
        $events = Event::all();
        return view('event-management.attendance', compact('user', 'events'));

    }

    public function finance()
    {
        $user = Auth::user();
        return view('event-management.finance', compact('user'));
    }

    public function borrow()
    {
        $user = Auth::user();
        return view('event-management.borrow', compact('user'));
    }

    // public function storeEvent(Request $request)
    // {
    //     $request->validate([
    //         'event_name' => 'required|string|max:255',
    //         'event_location' => 'required|string|max:255', // New field validation
    //         'event_date' => 'required|date',
    //         'check_in_time' => 'required',
    //         'check_out_time' => 'required|after:check_in_time',
    //     ]);

    //     Event::create([
    //         'event_name' => $request->event_name,
    //         'event_location' => $request->event_location, // Saving location
    //         'event_date' => $request->event_date,
    //         'check_in_time' => $request->check_in_time,
    //         'check_out_time' => $request->check_out_time,
    //     ]);

    //     return redirect()->route('event-management.events')->with('success', 'Event created successfully.');
    // }

    // public function editEvent(Event $event)
    // {
    //     $user = Auth::user();
    //     return view('event-management.edit-event', compact('user', 'event'));
    // }

    // public function updateEvent(Request $request, Event $event)
    // {
    //     $request->validate([
    //         'event_name' => 'required|string|max:255',
    //         'event_location' => 'required|string|max:255', // New validation
    //         'event_date' => 'required|date',
    //         'check_in_time' => 'required',
    //         'check_out_time' => 'required|after:check_in_time',
    //     ]);

    //     $event->update([
    //         'event_name' => $request->event_name,
    //         'event_location' => $request->event_location, // Updating location
    //         'event_date' => $request->event_date,
    //         'check_in_time' => $request->check_in_time,
    //         'check_out_time' => $request->check_out_time,
    //     ]);

    //     return redirect()->route('event-management.events')->with('success', 'Event updated successfully.');
    // }

    // public function deleteEvent(Event $event)
    // {
    //     $event->delete();
    //     return redirect()->route('event-management.events')->with('success', 'Event deleted successfully.');
    // }
}
