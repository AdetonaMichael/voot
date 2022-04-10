<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
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
        'about',
        'firstname',
        'lastname',
        'twitter',
        'facebook',
        'linkdin',
        'image',
        'stack',
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
    ];

    public function isAdmin(){
        return $this->role == 'admin';
    }
    public function isSuperAdmin(){
        return $this->role == 'superadmin';
    }
    public function isWriter(){
        return $this->role == 'writer';
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function deleteImage(){
        Storage::delete($this->image);
        // Storage::disk('s3')->delete($this->image);
    }
}
