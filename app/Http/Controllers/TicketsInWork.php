<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsInWork extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('assignee_id', Auth::user()->id)->get();
        return view('profile.agent.tickets.index', compact('tickets'));
    }
}
