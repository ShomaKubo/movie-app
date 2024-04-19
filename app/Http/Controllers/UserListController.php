<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\AdminProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserListController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * ユーザー一覧画面の表示
     */
    public function list(Request $request): View
    {
        $users = $this->user->findAllUsers();

        return view('user-list.list', compact('users'));
    }

    /**
     * 編集画面の表示
     */
    public function edit($id): View
    {
        $user = user::find($id);

        return view('user-list.edit', compact('user'));
    }

    /**
     * IDでユーザーを編集
     */
    public function update(AdminProfileUpdateRequest $request, $id): RedirectResponse
    {
        $user = User::find($id);
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

        return redirect()->route('user-list.list');
    }
}
