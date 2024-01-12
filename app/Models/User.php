<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
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
    public function roles(){
        return $this
        ->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')
        ->withTimestamps();
    }

    // public function getJWTIdentifier()
    // {
    //     return $this->getKey();
    // }
    
    // public function getJWTCustomClaims()
    // {
    //     return [];
    // }
    public function checkPermissionAccess($permissionCheck){
        $roles = auth()->user()->roles;
        //lay tat ca cac quyen cua user dang login he thong
        foreach ($roles as $role){
            $permissions = $role->permissions;
            
            //so sanh gia tri dua vao cua route hien tại xem có ton tại trong cac quyen minh da lay dc hay khong
            if($permissions->contains('key_code',$permissionCheck)){
                return true;
            }
            return false;
        }
    }
}