<?php

namespace App\Models;

use App\Casts\HexColor;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'avatar',
        'pseudo',
        'username',
        'color',
        'email',
        'password',
    ];

    protected $hidden = [
        'role_id',
        'password',
        'remember_token',
    ];

    protected $appends = [
        'is_staff'
    ];

    protected $casts = [
        'password' => 'hashed',
        'color' => HexColor::class,
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    protected function isStaff(): Attribute
    {
        return new Attribute(
            get: fn () => $this->role_id == 2,
        );
    }
}
