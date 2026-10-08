<form action="{{ route('profile.register.store') }}" method="post">
    @csrf
    <label for="name">
        <span>Имя: </span>
        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Введите имя"
            autocomplete="name">
    </label>
    @error('name')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    <br>
    <label for="email">
        <span>Email: </span>
        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Введите email"
            autocomplete="email">
    </label>
    @error('email')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    <br>
    <label for="password">
        <span>Пароль: </span>
        <input type="password" name="password" id="password" value="" placeholder="Введите пароль"
            autocomplete="new-password">
    </label>
    @error('password')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    <br>
    <label for="password_confirmation">
        <span>Повторите пароль: </span>
        <input type="password" name="password_confirmation" id="password_confirmation" value=""
            placeholder="Повторите пароль" autocomplete="new-password">
    </label>
    <br>
    <button type="submit">Зарегистрироваться</button>
    @if (session('error'))
        <div style="color:red;">{{ session('error') }}</div>
    @endif
</form>
