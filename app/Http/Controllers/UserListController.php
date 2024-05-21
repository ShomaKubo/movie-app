<?php

namespace App\Http\Controllers;

use App\Models\MovieWatchLog;
use App\Models\User;
use App\Http\Requests\AdminProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserListController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->movie_watch_log = new MovieWatchLog();
    }

    /**
     * ユーザー一覧画面の表示
     */
    public function list(): View
    {
        $users = $this->user->findAllUsers();

        return view('user-list.list', compact('users'));
    }

    /**
     * 編集画面の表示
     */
    public function edit($id): View
    {
        $user = $this->user->find($id);

        return view('user-list.edit', compact('user'));
    }

    /**
     * IDでユーザーを編集
     */
    public function update(AdminProfileUpdateRequest $request, $id): RedirectResponse
    {
        $user = $this->user->find($id);
        // 編集処理
        $this->user->updateUser($request, $user);

        return redirect()->route('user-list.list');
    }

    /**
     * IDでユーザーを削除
     */
    public function destroy($id): RedirectResponse
    {
        // 指定されたIDのレコードを削除
        $this->user->deleteUserById($id);

        // 動画視聴ログを削除
        $this->movie_watch_log->deleteMovieWatchLogByUserId($id);

        return redirect()->route('user-list.list');
    }
}
