@section('title', 'Создание заявки')

@section('content')
<form action="{{ route('profile.tickets.store') }}" method="post">
    <button type="submit">Отправить</button>
</form>

@endsection