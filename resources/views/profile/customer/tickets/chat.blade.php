@extends('welcome')

@section('title', $ticket->subject)

@section('content')
    <div class="mx-auto max-w-4xl space-y-6">
        <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <div>
                <p class="text-sm font-medium text-gray-500">
                    Заявка {{ $ticket->number }}
                </p>

                <h1 class="mt-1 text-xl font-semibold text-gray-900">
                    {{ $ticket->subject }}
                </h1>
            </div>

            <a href="{{ route('profile.tickets.index') }}"
                class="text-sm font-medium text-indigo-600 transition hover:text-indigo-800">
                К списку заявок
            </a>
        </div>
        <div class="flex min-h-96 flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="border-b border-gray-200 px-5 py-4">
                <h2 class="font-semibold text-gray-900">
                    Переписка
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Общение со службой поддержки
                </p>
            </div>
            <div id="messages" data-ticket-id="{{ $ticket->id }}" class="flex flex-1 flex-col gap-4 p-5">
                @forelse ($comments as $comment)
                    <div data-comment-id="{{ $comment->id }}" class="max-w-[85%] self-start rounded-xl bg-gray-100 p-3">
                        <p class="text-xs font-medium text-gray-500">
                            {{ $comment->user->name }}
                        </p>

                        <p class="mt-1 whitespace-pre-wrap break-words text-sm text-gray-900">{{ $comment->body }}</p>
                    </div>
                @empty
                    <p id="empty-messages" class="py-8 text-center text-sm text-gray-500">
                        Сообщений пока нет. Начните переписку с поддержкой.
                    </p>
                @endforelse
            </div>
            <form id="chat-form" action="{{ route('profile.tickets.chat.store', ['id' => $ticket->id]) }}" method="POST"
                class="border-t border-gray-200 p-4">
                @csrf
                <label for="message-body" class="sr-only">
                    Текст сообщения
                </label>
                <div class="flex items-end gap-3">
                    <textarea id="message-body" name="body" rows="2" maxlength="500" required placeholder="Напишите сообщение..."
                        class="min-h-12 min-w-0 flex-1 resize-y rounded-lg border border-gray-300 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">{{ old('body') }}</textarea>
                    <button type="submit"
                        class="inline-flex shrink-0 items-center gap-2 rounded-lg bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m22 2-7 20-4-9-9-4 20-7ZM22 2 11 13" />
                        </svg>

                        Отправить
                    </button>
                </div>
                @error('body')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </form>
        </div>

    </div>
@endsection
