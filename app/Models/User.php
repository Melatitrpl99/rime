<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App\Models
 * @version March 2, 2021, 7:57 am UTC
 *
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasFactory;

    public $table = 'users';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getJWTIdentifier ()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims ()
    {
        return [];
    }
}
