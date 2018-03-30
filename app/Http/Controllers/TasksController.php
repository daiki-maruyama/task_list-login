<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;    // 追加

class TasksController extends Controller
{
    // getでmessages/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', [    //全て取得の為、複数形で定義
            'tasks' => $tasks,
        ]);
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $task = new Task;     //新規作成のため、newインスタンス

        return view('tasks.create', [       //新規で作成のため単数形定義
            'task' => $task,
        ]);
    }

    // postでmessages/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:25',
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);
        
        $task = new Task;
        $task->title = $request->title;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    // getでmessages/idにアクセスされた場合の「詳細表示処理」
    public function show($id)
    {
        $task = Task::find($id);    //一つのidのみ取得する詳細ページ表示の為、単数形の変数定義

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    // getでmessages/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    // putまたはpatchでmessages/idにアクセスされた場合の「更新処理」
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'title' => 'required|max:25',
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);
        
        $task = Task::find($id);
        $task->title = $request->title;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    // deleteでmessages/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }
}
