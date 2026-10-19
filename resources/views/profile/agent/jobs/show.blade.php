@extends('welcome')

@section('title', 'Заявка #' . $ticket->id)

@section('content')
    <div class="mx-auto max-w-4xl space-y-6">

        {{-- Заголовок --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-medium text-gray-500">
                Заявка #{{ $ticket->id }}
            </p>

            <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-900">
                {{ $ticket->subject }}
            </h1>

            <div class="mt-4">
                <span class="inline-flex items-center rounded-full bg-amber-50 px-3 py-1 text-sm font-medium text-amber-700">
                    Ожидает сотрудника
                </span>
            </div>
        </div>

        {{-- Информация о клиенте --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-900">
                Информация о клиенте
            </h2>

            <div class="mt-4 flex items-center gap-3">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 text-lg font-semibold text-blue-700">
                    {{ mb_substr($ticket->customer->name, 0, 1) }}
                </div>

                <div>
                    <p class="font-medium text-gray-900">
                        {{ $ticket->customer->name }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Автор заявки
                    </p>
                </div>
            </div>
        </div>

        {{-- Описание заявки --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-900">
                Описание проблемы
            </h2>

            <div class="mt-4 whitespace-pre-wrap break-words text-sm leading-7 text-gray-700">{{ $ticket->body }}</div>
        </div>

        {{-- Действия --}}
        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('profile.jobs.index') }}"
                class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                Назад к заявкам
            </a>

            <form action="{{ route('profile.jobs.store', $ticket->id) }}" method="POST">
                @csrf

                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">
                    Взять в работу
                </button>
            </form>
        </div>

    </div>
@endsection
