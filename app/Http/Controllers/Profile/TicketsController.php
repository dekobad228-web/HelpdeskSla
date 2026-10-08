<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('customer_id', Auth::id())->get();
        return view('profile.tickets.index', compact('tickets'));
    }

    public function create()
    {
        
        return;
    }
}
