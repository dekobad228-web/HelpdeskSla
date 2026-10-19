@extends('welcome')

@section('title', 'Моя работа')

@section('content')
    @foreach ($tickets as $ticket)
        <a href="{{ route('profile.tickets.store') }}">
            {{ $ticket->number }}
        </a>
    @endforeach
@endsection
