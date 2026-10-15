@extends('welcome')

@section('title', 'Создание заявки')

@section('content')
    <div class="mx-auto max-w-3xl">

        <div class="mb-8">
            <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600">
                Служба поддержки
            </p>

            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Создание заявки
            </h1>

            <p class="mt-3 text-base leading-7 text-gray-600">
                Опишите свою проблему, и наша команда поможет вам её решить.
            </p>
        </div>

        <form action="{{ route('profile.tickets.store') }}" method="post"
            class="space-y-8 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">
            @csrf

            {{-- Категория обращения --}}
            @if ($categories->isNotEmpty())
                <section>
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">
                            Категория обращения
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Выберите категорию, которая лучше всего описывает вашу проблему.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                        @foreach ($categories as $category)
                            <label for="category-{{ $category->id }}"
                                class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 p-4 transition hover:border-blue-300 hover:bg-blue-50 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                <input id="category-{{ $category->id }}" type="radio" name="category_id"
                                    value="{{ $category->id }}" class="size-4 shrink-0 accent-blue-600"
                                    @checked((string) old('category_id', $loop->first ? $category->id : '') === (string) $category->id)>

                                <span class="text-sm font-medium text-gray-800">
                                    {{ $category->name }}
                                </span>
                            </label>
                        @endforeach
                    </div>

                    @error('category_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </section>
                <div class="border-t border-gray-100"></div>
            @endif

            {{-- Заголовок --}}
            <section>
                <label for="subject" class="mb-2 block text-sm font-semibold text-gray-900">
                    Заголовок обращения
                    <span class="text-red-500">*</span>
                </label>

                <p class="mb-3 text-sm text-gray-500">
                    Кратко сформулируйте суть проблемы.
                </p>

                <input id="subject" type="text" name="subject" value="{{ old('subject') }}"
                    placeholder="Например: Не могу войти в аккаунт" required maxlength="255"
                    class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('subject') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror">

                @error('subject')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </section>

            {{-- Описание --}}
            <section>
                <label for="body" class="mb-2 block text-sm font-semibold text-gray-900">
                    Описание проблемы
                    <span class="text-red-500">*</span>
                </label>

                <p class="mb-3 text-sm text-gray-500">
                    Подробно расскажите, что произошло и какие действия привели к проблеме.
                </p>

                <textarea id="body" name="body" rows="7" required placeholder="Опишите проблему..."
                    class="w-full resize-y rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm leading-6 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 @error('body') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror">{{ old('body') }}</textarea>

                @error('body')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </section>

            {{-- Общие ошибки валидации --}}
            @if ($errors->any())
                <div class="rounded-xl border border-red-200 bg-red-50 p-4">
                    <p class="text-sm font-semibold text-red-800">
                        Не удалось отправить заявку
                    </p>

                    <p class="mt-1 text-sm text-red-700">
                        Проверьте заполнение полей и попробуйте ещё раз.
                    </p>
                </div>
            @endif

            {{-- Кнопки --}}
            <div
                class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('profile.tickets.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                    Отмена
                </a>

                <button type="submit"
                    class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer">
                    Отправить заявку
                </button>
            </div>
        </form>

    </div>
@endsection
