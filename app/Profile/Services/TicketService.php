<?php

namespace App\Profile\Services;

use App\Models\{Category, Ticket, TicketEvent, User};
use App\Cases\{TicketStatus, TicketPriority};
use Illuminate\Support\Facades\DB;

class TicketService
{
    public function createTicket(User $user, array $data)
    {
        $category = Category::findOrFail($data['category_id']);

        $result = DB::transaction(function () use ($user, $data, $category) {

            $ticket = Ticket::create([
                'customer_id' => $user->id,
                'category_id' => $category->id,
                'subject' => $data['subject'],
                'body' => $data['body'],
                'priority' => TicketPriority::Low,
                'status' => TicketStatus::New,
                'first_response_due_at' => now()->addMinutes($category->sla_first_response_minutes),
                'resolution_due_at' => now()->addMinutes($category->sla_resolution_minutes),
            ]);

            $ticket->update(['number' => $this->createNumber($ticket->id)]);

            TicketEvent::create([
                'ticket_id' => $ticket->id,
                'user_id' => $user->id,
                'type' => 'created',
            ]);

            return $ticket;
        });

        return $result;
    }

    protected function createNumber(int $int)
    {
        $int = str_pad($int, 6, "0", STR_PAD_LEFT);

        $array = ["T", date('Y'), $int];
        return implode("-", $array);
    }
}
