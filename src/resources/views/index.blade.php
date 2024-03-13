@extends('layouts.app')

@section('title')
<title>TOP | Todo</title>
@endsection

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
                <h2 class="create-ttl">新規作成</h2>
                <form action="/todos" method="post" class="create-form">
                    @csrf
                    <div class="create-form__item">
                        <input type="text" class="create-form__input-txt" name="content" value="{{ old('content') }}">
                        <select name="category_id" class="create-form__select-category">
                            <option value="">カテゴリ</option>
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="create-form__btn">
                        <button class="create-form__btn-create" type="submit">作成</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="search">
            <div class="search__inner">
                <h2 class="search-ttl">Todo検索</h2>
                <form action="/todos/search" method="get" class="search-form">
                    <div class="search-form__item">
                        <input type="text" class="search-form__input-txt" name="keyword" value="{{ old('keyword') }}">
                        <select name="category_id" class="search-form__select-category">
                            <option value="">カテゴリ</option>
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search-form__btn">
                        <button class="search-form__btn-create" type="submit">検索</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="todo">
            <div class="todo__inner">
                <div class="todo__ttl">
                    <span class="todo__ttl-span">Todo</span>
                    <span class="todo__ttl-span">カテゴリ</span>
                </div>
                <ul class="todo__list">
                    @foreach ($todos as $todo)
                    <li class="todo__list-item">
                        <form action="/todos/update" class="update-form" method="post">
                            @method('PATCH')
                            @csrf
                            
                            <div class="update-form__item">
                                <input type="text" name="content" value="{{ $todo['content'] }}" class="update-form__item-content">
                                <input type="hidden" name="id" value="{{ $todo['id'] }}" class="update-form__item-id">
                            </div>
                            <div class="update-form__category">
                                <p class="update-form__category-txt">
                                    @foreach($categories as $category)
                                        @if($category['id'] == $todo['category_id'])
                                            {{ $category['name'] }}
                                            @break
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                            <div class="update-form__btn">
                                <button type="submit" class="update-form__btn-submit">更新</button>
                            </div>
                        </form>
                        <form action="/todos/delete" class="delete-form" method="post">
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