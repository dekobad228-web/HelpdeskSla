<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index()
    {
        $tickets = Ticket::query()->with('customer')->orderBy('id', 'desc')->get();
        return view('profile.agent.jobs.index', compact('tickets'));
    }

    public function store(Request $request, int $id)
    {
        DB::transaction(function () use ($request, $id) {
            $ticket = Ticket::findOrFail($id)->get();

            $ticket->update([
                'assignee_id' => $request->user()->id
            ]);
        });

        return;
    }

    public function show(Request $request, int $ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id)->with('customer')->first();
        return view('profile.agent.jobs.show', compact('ticket'));
    }
}
