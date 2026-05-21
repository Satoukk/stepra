<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'icon',
        'profile_text',
        'notification_enabled',
        'theme_color',
        'level',
        'xp',
        'streak',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
        'notification_enabled' => 'boolean',
    ];

    public const UPDATED_AT = null;
}
