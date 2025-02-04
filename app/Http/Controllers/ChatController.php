<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatController extends Controller
{
    // Show chat page with a specific user
    // public function showChat($id)
    // {
    //     $user = Auth::user();
    //     $receiver = User::findOrFail($id);

    //     // Fetch messages between authenticated user and the receiver
    //     $messages = Message::where(function ($query) use ($user, $receiver) {
    //         $query->where('sender_id', $user->id)->where('receiver_id', $receiver->id);
    //     })->orWhere(function ($query) use ($user, $receiver) {
    //         $query->where('sender_id', $receiver->id)->where('receiver_id', $user->id);
    //     })->orderBy('created_at', 'asc')->get();

    //     return view('inbox', compact('user', 'receiver', 'messages'));
    // }
    public function fetchChat($id)
    {
        if (!request()->ajax()) {
            return response()->json(['error' => 'Unauthorized request'], 403);
        }

        $user = Auth::user();
        $receiver = User::find($id);

        if (!$receiver) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Fetch messages between authenticated user and the receiver
        $messages = Message::where(function ($query) use ($user, $receiver) {
            $query->where('sender_id', $user->id)->where('receiver_id', $receiver->id);
        })->orWhere(function ($query) use ($user, $receiver) {
            $query->where('sender_id', $receiver->id)->where('receiver_id', $user->id);
        })->orderBy('created_at', 'asc')->get();

        return response()->json([
            'auth_user_id' => $user->id,
            'auth_user_pic' => asset($user->profile_pic ?? 'frontend/img/default-pp.jpeg'),
            'receiver_id' => $receiver->id,
            'receiver_name' => $receiver->name,
            'receiver_pic' => asset($receiver->profile_pic ?? 'frontend/img/default-pp.jpeg'),
            'receiver_role' => $receiver->status ?? 'User',
            'messages' => $messages->map(function ($msg) {
                return [
                    'sender_id' => $msg->sender_id,
                    'receiver_id' => $msg->receiver_id,
                    'message' => $msg->message,
                    'time' => $msg->created_at->format('h:i A')
                ];
            }),
        ]);
    }



    // Send message
    // public function sendMessage(Request $request)
    // {
    //     $request->validate([
    //         'receiver_id' => 'required|exists:users,id',
    //         'message' => 'required|string',
    //     ]);

    //     Message::create([
    //         'sender_id' => Auth::id(),
    //         'receiver_id' => $request->receiver_id,
    //         'message' => $request->message,
    //     ]);

    //     return response()->json(['success' => true]);
    // }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => $message,
            'auth_user_pic' => asset(Auth::user()->profile_pic ?? 'frontend/img/default-pp.jpeg'),
        ]);
        // return response()->json(['success' => true, 'message' => $message]);
    }

    public function showInbox()
    {
        $user = Auth::user(); // Get the logged-in user

        // Fetch all users except the logged-in user
        $contacts = User::where('id', '!=', $user->id)->get();

        // Get the latest message per contact (grouped by conversation partner) and order by newest first
        $latestMessages = Message::where(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                      ->orWhere('receiver_id', $user->id);
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($message) use ($user) {
                return $message->sender_id == $user->id ? $message->receiver_id : $message->sender_id;
            })
            ->sortByDesc(function ($messages) {
                return $messages->first()->created_at; // Order by the newest message
            });

        return view('inbox', compact('user', 'contacts', 'latestMessages'));
    }

}
