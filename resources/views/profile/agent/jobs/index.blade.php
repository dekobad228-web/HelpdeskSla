@extends('welcome')

@section('title', 'Заявки')

@section('content')
    <div class="mx-auto max-w-6xl space-y-6">

        {{-- Заголовок страницы --}}
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-900">
                    Заявки
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Список заявок, ожидающих обработки службой поддержки.
                </p>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white px-4 py-3 shadow-sm">
                <p class="text-xs font-medium text-gray-500">
                    Всего заявок
                </p>

                <p class="mt-1 text-xl font-bold text-gray-900">
                    {{ $tickets->count() }}
                </p>
            </div>
        </div>

        {{-- Список заявок --}}
        <div class="space-y-3">
            @forelse ($tickets as $ticket)
                <a href="{{ route('profile.jobs.show', $ticket->id) }}"
                    class="group block rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:border-blue-300 hover:shadow-md">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        {{-- Основная информация --}}
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-blue-600">
                                    {{ $ticket->number }}
                                </span>

                                <span class="text-xs text-gray-400">
                                    Заявка #{{ $ticket->id }}
                                </span>
                            </div>

                            <h2 class="mt-2 text-lg font-semibold text-gray-900 transition group-hover:text-blue-600">
                                {{ $ticket->subject }}
                            </h2>

                            <p class="mt-2 line-clamp-2 text-sm leading-6 text-gray-600">
                                {{ $ticket->body }}
                            </p>
                        </div>

                        {{-- Клиент и переход --}}
                        <div
                            class="flex shrink-0 items-center justify-between gap-4 border-t border-gray-100 pt-4 sm:border-t-0 sm:pt-0">
                            <div class="flex min-w-0 items-center gap-3">
                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-50 text-sm font-semibold text-blue-700">
                                    {{ mb_substr($ticket->customer->name ?? '?', 0, 1) }}
                                </div>

                                <div class="min-w-0">
                                    <p class="text-xs text-gray-500">
                                        Клиент
                                    </p>

                                    <p class="mt-1 truncate text-sm font-medium text-gray-900">
                                        {{ $ticket->customer->name ?? 'Неизвестный клиент' }}
                                    </p>
                                </div>
                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-gray-50 text-gray-500 transition group-hover:bg-blue-50 group-hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="rounded-2xl border border-dashed border-gray-300 bg-white px-6 py-16 text-center">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Заявок пока нет
                    </h2>

                    <p class="mt-2 text-sm text-gray-500">
                        Когда появятся новые заявки, они отобразятся здесь.
                    </p>
                </div>
            @endforelse
        </div>

    </div>
@endsection
