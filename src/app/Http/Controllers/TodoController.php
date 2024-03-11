<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = TODO::all();
        return view('index', ['todos' => $todos]);
    }

    public function store(TodoRequest $request)
    {
        $form = $request->only(['content']);
        Todo::create($form);

        return redirect('/')->with('message', 'Todoを作成しました');
    }

    public function update(TodoRequest $request)
    {
        $form = $request->only(['content']);
        Todo::find($request->id)->update($form);
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }
}
