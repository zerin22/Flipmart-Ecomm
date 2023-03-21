<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cache;
use Illuminate\Support\Facades\Cache as FacadesCache;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role_id',
        'email',
        'phone',
        'image',
        'password',
        'Isban',
        'last_seen',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function userIsOnline(){
        return Cache::has('isOnline'. $this->id);
    }

    public function relationWithBlog()
    {
        return $this->hasMany(Blog::class);
    }

    public function relationWithAdminBio()
    {
        return $this->hasOne(AdminBio::class, 'auth_id', 'id');
    }
}
