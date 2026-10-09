@extends('profile.index')

@section('title', 'Создание заявки')

@section('content')
<form action="{{ route('profile.tickets.store') }}" method="post">
    @csrf
    <div class="categories">
        @foreach ($categories as $category)
        <label for="category-{{ $category->id }}" class="label-radio">
            <p class="">{{ $category->name}}</p>
            <input id="category-{{ $category->id }}" type="radio" name="category_id" value="{{ $category->id }}"
                autocomplete="name" @checked($loop->first)>
        </label>
        @endforeach
    </div>
    <br>
    <hr>
    <br>
    <h3>Заголовок обращения</h3>
    <br>
    <label for="subject">
        <input id="subject" type="text" name="subject" autocomplete="">
        <br>
    </label>
    <br>
    <hr>
    <br>
    <h3>Тело обращения</h3>
    <br>
    <label for="body">
        <textarea name="body" id="body" cols="60" rows="12"></textarea>
        <br>
    </label>
    <br>
    <br>
    <button type="submit" class="button button-form">Отправить</button>
</form>
<style>
    .label-radio {
        display: flex;
        flex-flow: row;
        align-items: center;
        gap: 20px;
        cursor: pointer;
    }
</style>
@endsection