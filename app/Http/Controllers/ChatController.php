<?php

namespace App\Http\Controllers;

use App\Models\{Ticket, Comment};
use Illuminate\Http\Request;
use App\Events\CommentStoredEvent;
use App\Http\Resources\CommentResource;

class ChatController extends Controller
{
    public function index(Request $request, int $ticket_id)
    {
        $comments = Comment::where('ticket_id', $ticket_id)->get();
        $ticket = Ticket::findOrFail($ticket_id);

        return view('profile.tickets.chat', compact('comments', 'ticket'));
    }

    public function store(Request $request, int $ticket_id)
    {
        $validated = $request->validate([
            'body' => [
                'required',
                'string',
                'max:500'
            ],
            'is_internal' => [
                'boolean'
            ]
        ]);

        $user = $request->user();
        $comment = Comment::create([
            'ticket_id' => $ticket_id,
            'user_id' => $user->id,
            'body' => $validated['body']
        ]);
        CommentStoredEvent::dispatch($comment);
        return CommentResource::make($comment)->resolve();
    }
}
