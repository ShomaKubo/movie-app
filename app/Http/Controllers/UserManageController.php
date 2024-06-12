<?php

namespace App\Http\Controllers;

use App\Models\MovieWatchLog;
use App\Models\User;
use App\Http\Requests\AdminProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;

use Illuminate\View\View;

class UserManageController extends Controller
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
    public function edit($user_id): View
    {
        $user = $this->user->find($user_id);

        return view('user-list.edit', compact('user'));
    }

    /**
     * IDでユーザーを編集
     */
    public function update(AdminProfileUpdateRequest $request, $user_id): RedirectResponse
    {
        $user = $this->user->find($user_id);
        // 編集処理
        $this->user->updateUser($request, $user);

        return redirect()->route('user-list.list');
    }

    /**
     * IDでユーザーを削除
     */
    public function destroy($user_id): RedirectResponse
    {
        // 指定されたIDのレコードを削除
        $this->user->deleteUserById($user_id);

        // 動画視聴ログを削除
        $this->movie_watch_log->deleteMovieWatchLogByUserId($user_id);

        return redirect()->route('user-list.list');
    }
}
