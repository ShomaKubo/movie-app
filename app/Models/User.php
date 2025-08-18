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
     * ユーザーの動画視聴ログを取得する
     */
    public function movieWatchLogs()
    {
        return $this->hasMany(MovieWatchLog::class);
    }

    /**
     * 全てのユーザーデータを取得
     */
    public function findAllUsers()
    {
        return User::all();
    }
    
    /**
     * 全ユーザーの進捗状況を取得
     */
    public function findAllUserProgress()
    {
        return User::withCount('movieWatchLogs as watch_count')
            ->orderBy('id')
            ->get();
    }

    /**
     * 更新処理
     */
    public function updateUser($request, $user)
    {
        $user->fill([
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
