<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketsController extends Controller
{
    public function index()
    {

        return view('profile.tickets.index');
    }
}
