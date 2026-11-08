<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // # TRAIT MODEL USER
    use HasFactory, Notifiable;

    // # KOLOM YANG DAPAT DIISI
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
    ];

    // # KOLOM YANG DISEMBUNYIKAN
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // # PENGATURAN TIPE DATA
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
