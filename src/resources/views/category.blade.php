@extends('layouts.app')

@section('title')
<title>カテゴリー | Todo</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
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
                <form action="/categories" method="post" class="create-form">
                    @csrf
                    <div class="create-form__item">
                        <input type="text" class="create-form__input-txt" name="name">
                    </div>
                    <div class="create-form__btn">
                        <button class="create-form__btn-create" type="submit">作成</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="category">
            <div class="category__inner">
                <div class="category__ttl">
                    <span class="category__ttl-span">Category</span>
                </div>
                <ul class="category__list">
                    @foreach ($categories as $category)
                    <li class="category__list-item">
                        <form action="/categories/update" class="update-form" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="update-form__item">
                                <input type="text" name="name" value="{{ $category['name'] }}" class="update-form__item-content">
                                <input type="hidden" name="id" value="{{ $category['id'] }}" class="update-form__item-id">
                            </div>
                            <div class="update-form__btn">
                                <button type="submit" class="update-form__btn-submit">更新</button>
                            </div>
                        </form>
                        <form action="/categories/delete" class="delete-form" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="delete-form__item">
                                <input type="hidden" name="id" value="{{ $category['id'] }}" class="delete-form__item-id">
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