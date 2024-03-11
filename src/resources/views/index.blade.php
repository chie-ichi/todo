@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
        @if(session('message'))
        <div class="message">
            <div class="message__inner">
                <p class="message__txt">{{ session('message') }}</p>
            </div>
        </div>
        @endif
        @if($errors->any())
        <div class="message message--error">
            <div class="message__inner">
                @foreach($errors->all() as $error)
                <p class="message__txt">{{ $error }}</p>
                @endforeach
            </div>
        </div>
        @endif
        <div class="create">
            <div class="create__inner">
                <form action="/todos" method="post" class="create__form">
                    @csrf
                    <input type="text" class="create__input-txt" name="content">
                    <button class="create__btn" type="submit">作成</button>
                </form>
            </div>
        </div>
        <div class="todo">
            <div class="todo__inner">
                <h2 class="todo__ttl">Todo</h2>
                <ul class="todo__list">
                    @foreach ($todos as $todo)
                    <li class="todo__list-item">
                        <form action="/todos/update" class="update-form" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="update-form__item">
                                <input type="text" name="content" value="{{ $todo['content'] }}" class="update-form__item-content">
                                <input type="hidden" name="id" value="{{ $todo['id'] }}" class="update-form__item-id">
                            </div>
                            <div class="update-form__btn">
                                <button type="submit" class="update-form__btn-submit">更新</button>
                            </div>
                        </form>
                        <form action="/todos/delete" class="delete-form" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="delete-form__item">
                                <input type="hidden" name="id" value="{{ $todo['id'] }}" class="delete-form__item-id">
                            </div>
                            <div class="delete-form__btn">
                             <button class="delete-form__btn-submit" type="submit">削除</button>
                            </div>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection