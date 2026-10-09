@extends('profile.index')

@section('title', 'Ваши заявки')

@section('content')
    @foreach ($tickets as $ticket)
        <a href="{{ route('profile.tickets.show', ['id' => $ticket->id]) }}">
            {{ $ticket->number }}
        </a>
    @endforeach
@endsection
