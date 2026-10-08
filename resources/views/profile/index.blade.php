<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователь: {{ $request->user()->id }}</title>
</head>

<body>
    <header>
        <h1>Профиль пользователя {{ $request->user()->name }}</h1>
        <form action="{{ route('profile.logout') }}" method="post"></form>
    </header>
    <div class="page">
        <h3>Страница @section('title')</h3>
        <div class="container">
            @section('content')
        </div>
    </div>
</body>

</html>