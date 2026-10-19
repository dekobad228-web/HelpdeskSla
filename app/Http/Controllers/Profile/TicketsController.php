<?php

namespace App\Http\Controllers\Profile;

use App\Models\{Category, Ticket};
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Profile\Services\TicketService;

class TicketsController extends Controller
{
    public function __construct(private TicketService $service) {}

    public function index()
    {
        $tickets = Ticket::where('customer_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('profile.customer.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('profile.customer.tickets.create', compact('categories'));
    }

    public function store(TicketCreateRequest $request)
    {
        $this->service->createTicket($request->user(), $request->validated());
        return redirect()->route('profile.tickets.index');
    }

    public function show(int $ticket_id)
    {
        $ticket = Ticket::select('id', 'number', 'subject', 'body')->findOrFail($ticket_id);
        return view('profile.customer.tickets.show', compact('ticket'));
    }
}
