<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * 全てのユーザーデータを取得
     */
    public function findAllUsers()
    {
        return User::all();
    }

    /**
     * 更新処理
     */
    public function updateUser($request, $user)
    {
        $result = $user->fill([
            'name' => $request->name,
            'email' => $request->email
        ])->save();
    }

    /**
     * 削除処理
     */
    public function deleteUserById($id)
    {
        return $this->destroy($id);
    }
}
