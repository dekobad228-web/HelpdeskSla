@extends('welcome')

@section('title', 'Заявка: ' . $ticket->number)

@section('content')
    {{ dump($ticket) }}
    <div class="mx-auto max-w-3xl">

        <div class="mb-8">
            <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600">
                {{ $ticket->number }}
            </p>

            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                {{ $ticket->subject }}
            </h1>
        </div>
        <p class="space-y-8 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">
            {{ $ticket->body }}
        </p>
    @endsection
