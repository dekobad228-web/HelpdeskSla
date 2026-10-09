<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователь: {{ $user->id }}</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="block">
                <h1>Профиль пользователя {{ $user->name }}</h1>
                <form action="{{ route('profile.logout') }}" method="post">
                    <button type="submit" class="button">Выйти</button>
                </form>
            </div>
        </div>
    </header>
    <div class="page">
        <div class="container">
            <div class="page-block">
                <h3>Страница @yield('title')</h3>
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

    .button:hover {
        background-color: white;
        color: red;
    }

    .container {
        max-width: 1720px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .block {
        display: flex;
        flex-flow: row;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
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