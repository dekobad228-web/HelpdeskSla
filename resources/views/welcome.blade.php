<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} — @yield('title', 'Главная')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="flex min-h-screen flex-col bg-gray-100 font-sans text-gray-900 antialiased">

    <header class="border-b border-gray-200 bg-white shadow-sm">
        <div
            class="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">

            @auth
                <a href="{{ route('profile.index') }}"
                    class="order-3 w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 sm:order-none sm:w-auto">
                    <h1 class="text-sm font-semibold text-gray-900">
                        {{ Auth::user()->name }}
                    </h1>

                    <p class="mt-1 text-sm text-gray-500">
                        Роль:
                        <span class="font-medium text-gray-700">
                            {{ Auth::user()->role }}
                        </span>
                    </p>
                </a>
            @else
                <a href="{{ url('/') }}"
                    class="text-xl font-bold tracking-tight text-blue-600 transition hover:text-blue-700">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @endauth

            <nav class="flex flex-wrap items-center gap-2">
                @auth
                    <a href="{{ url('/profile') }}"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-blue-600">
                        Личный кабинет
                    </a>

                    <a href="{{ route('profile.tickets.index') }}"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-blue-600">
                        Заявки
                    </a>

                    <a href="{{ route('profile.tickets.create') }}"
                        class="rounded-lg bg-blue-600 px-3 py-2 text-sm font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Создать заявку
                    </a>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-semibold text-gray-700 transition hover:border-red-300 hover:bg-red-50 hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 cursor-pointer">
                            Выйти
                        </button>
                    </form>
                @else
                    @if (Route::has('login.index'))
                        <a href="{{ route('login.index') }}"
                            class="rounded-lg px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900">
                            Войти
                        </a>
                    @endif

                    @if (Route::has('register.index'))
                        <a href="{{ route('register.index') }}"
                            class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Регистрация
                        </a>
                    @endif
                @endauth
            </nav>

        </div>
    </header>

    <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        @yield('content')
    </main>

    <footer class="mt-auto border-t border-gray-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-5 text-center text-sm text-gray-500 sm:px-6 lg:px-8">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Все права защищены.
        </div>
    </footer>

</body>

</html>
