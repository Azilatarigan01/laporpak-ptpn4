<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'profil',
        'jabatan',
        'urutan',
        'deskripsi_jabatan',
        'is_delete',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'urutan' => 'integer',
    ];

    public static function getEmailSingle($email)
    {
        return self::where('email', '=', $email)->where('is_delete', 0)->first();
    }

    public static function getAdmin($limit = 10)
    {
        return self::where('user_type', 1)
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public static function getKepala($limit = 10)
    {
        $query = self::where('user_type', 2)->where('is_delete', 0);

        try {
            if (Schema::hasColumn('users', 'urutan')) {
                $query->orderBy('urutan', 'asc')->orderBy('id', 'asc');
            } else {
                $query->orderBy('id', 'asc');
            }
        } catch (\Throwable $e) {
            $query->orderBy('id', 'asc');
        }

        return $query->paginate($limit);
    }

    public static function getPimpinanAll()
    {
        $query = self::where('user_type', 2)->where('is_delete', 0);

        try {
            if (Schema::hasColumn('users', 'urutan')) {
                $query->orderBy('urutan', 'asc')->orderBy('id', 'asc');
            } else {
                $query->orderBy('id', 'asc');
            }
        } catch (\Throwable $e) {
            $query->orderBy('id', 'asc');
        }

        return $query->get();
    }

    public static function getSingle($id)
    {
        return self::where('id', $id)->where('is_delete', 0)->first();
    }
}
