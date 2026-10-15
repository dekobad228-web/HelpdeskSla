@extends('welcome')

@section('title', 'Login')

@section('content')
    <div class="flex min-h-[80vh] items-center justify-center bg-gray-100 px-4 py-10">
        <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg sm:p-10">

            <h1 class="mb-2 text-center text-3xl font-bold text-gray-900">
                Вход в аккаунт
            </h1>

            <p class="mb-8 text-center text-sm text-gray-500">
                Введите свои данные для входа
            </p>

            <form action="{{ route('login.store') }}" method="post" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-700">
                        Email
                    </label>

                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        placeholder="Введите email" autocomplete="email"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 @error('email') border-red-500 focus:border-red-500 focus:ring-red-200 @enderror">

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-gray-700">
                        Пароль
                    </label>

                    <input type="password" name="password" id="password" placeholder="Введите пароль"
                        autocomplete="current-password"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200">
                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:scale-[0.99]">
                    Войти в личный кабинет
                </button>
            </form>

        </div>
    </div>
@endsection