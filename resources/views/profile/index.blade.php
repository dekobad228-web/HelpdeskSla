<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователь: {{ Auth::user()->id }}</title>
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="block">
                <div class="top">
                    <h1>Профиль пользователя {{ Auth::user()->name }}</h1>
                    <h2>Роль пользователя: {{ Auth::user()->role }}</h2>
                    <form action="{{ route('profile.logout') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button">Выйти</button>
                    </form>
                </div>
                <hr>
                <div class="nav">
                    <a href="{{ route('profile.tickets.index') }}">
                        Заявки
                    </a>
                    <a href="{{ route('profile.tickets.create') }}">
                        Создать заявку
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="page">
        <div class="container">
            <div class="page-block">
                <h3>@yield('title')</h3>
                @yield('content')
            </div>
        </div>
    </div>
</body>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .header {
        padding: 30px 0;
    }

    .block {
        display: flex;
        flex-flow: column;
        gap: 30px;
    }

    .top {
        display: flex;
        flex-flow: row;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
    }

    .nav {
        display: flex;
        flex-flow: row;
        justify-content: left;
        gap: 20px;
    }

    .nav a {
        font-size: 16px;
        color: black;
        font-weight: 500;
        line-height: 1;
        text-decoration: none;
        transition: 0.3s ease-in-out;
    }

    .nav a:hover {
        color: red;
        text-decoration: underline;
    }

    .button {
        max-width: 280px;
        width: 100%;
        border-radius: 15px;
        border: 2px solid red;
        background-color: red;
        color: white;
        font-size: 20px;
        line-height: 1;
        font-weight: 500;
        padding: 10px 30px;
        cursor: pointer;
        transition: .3s ease-in-out;
    }

    .button .button-form {
        background-color: blue;
    }

    .button:hover {
        background-color: white;
        color: red;
    }

    .button .button-form:hover {
        background-color: white;
        color: blue;
    }

    .container {
        max-width: 1720px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .page {
        margin-top: 40px;
        width: 100%;
    }

    .page-block {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 30px;
    }
</style>

</html>
