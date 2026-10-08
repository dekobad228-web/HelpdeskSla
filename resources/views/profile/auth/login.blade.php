<form action="{{ route('profile.login.store') }}" method="post">
    @csrf
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
            autocomplete="current-password">
    </label><br>
    <button type="submit">Войти в личный кабинет</button>
</form>
