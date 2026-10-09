@extends('profile.index')

@section('title', 'Ваши заявки')

@section('content')
    @foreach ($tickets as $ticket)
        {{ dump($ticket) }}
    @endforeach
@endsection
