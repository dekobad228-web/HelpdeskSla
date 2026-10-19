@extends('welcome')

@section('title', 'Заявка: ' . $ticket->number)

@section('content')

    <div class="mx-auto max-w-3xl">

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600">
                    {{ $ticket->number }}
                </p>

                <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    {{ $ticket->subject }}
                </h1>
            </div>
            <a href="{{ route('profile.tickets.chat.index', $ticket->id) }}"
                class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Чат
            </a>
        </div>
        <p class="space-y-8 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">
            {{ $ticket->body }}
        </p>
    @endsection
