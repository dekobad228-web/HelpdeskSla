@extends('welcome')

@section('title', 'Ваши заявки')

@section('content')
    <div class="mx-auto max-w-5xl">

        {{-- Заголовок страницы --}}
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600">
                    Служба поддержки
                </p>

                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    Ваши заявки
                </h1>

                <p class="mt-2 text-gray-600">
                    Здесь вы можете просматривать свои обращения в службу поддержки.
                </p>
            </div>

            <a href="{{ route('profile.tickets.create') }}"
                class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                + Создать заявку
            </a>
        </div>

        {{-- Список заявок --}}
        @forelse ($tickets as $ticket)
            <a href="{{ route('profile.tickets.show', ['id' => $ticket->id]) }}"
                class="group mb-4 block rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:border-blue-300 hover:shadow-md sm:p-6">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div class="min-w-0">
                        <div class="mb-2 flex flex-wrap items-center gap-3">
                            <span class="text-sm font-bold text-blue-600">
                                {{ $ticket->number }}
                            </span>

                            @if ($ticket->status)
                                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                                    {{ $ticket->status->value ?? $ticket->status }}
                                </span>
                            @endif
                        </div>

                        <h2 class="text-lg font-semibold text-gray-900 transition group-hover:text-blue-600">
                            {{ $ticket->subject ?: 'Без заголовка' }}
                        </h2>

                        @if ($ticket->created_at)
                            <p class="mt-2 text-sm text-gray-500">
                                Создана: {{ $ticket->created_at->format('d.m.Y, H:i') }}
                            </p>
                        @endif
                    </div>

                    <div class="flex shrink-0 items-center justify-between gap-3 sm:justify-end">
                        <span class="text-sm font-medium text-gray-500 transition group-hover:text-blue-600">
                            Открыть заявку
                        </span>

                        <span class="text-xl text-gray-400 transition group-hover:translate-x-1 group-hover:text-blue-600">
                            →
                        </span>
                    </div>

                </div>
            </a>
        @empty
            <div class="rounded-2xl border border-dashed border-gray-300 bg-white px-6 py-16 text-center shadow-sm">
                <div class="mx-auto flex size-14 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 10h8M8 14h5m-7 6h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                    </svg>
                </div>

                <h2 class="mt-5 text-xl font-bold text-gray-900">
                    У вас пока нет заявок
                </h2>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-gray-500">
                    Если у вас возникла проблема или вопрос, создайте заявку — служба поддержки поможет вам.
                </p>

                <a href="{{ route('profile.tickets.create') }}"
                    class="mt-6 inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Создать первую заявку
                </a>
            </div>
        @endforelse

    </div>
@endsection
