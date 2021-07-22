<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App\Models
 * @version March 2, 2021, 7:57 am UTC
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasFactory, HasRoles;

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    public $fillable = [
        'name',
        'email',
        'password',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'no_hp',
        'no_wa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'tgl_lahir' => 'date',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'          => ['required', 'string'],
        'email'         => ['required', 'email', 'unique:users'],
        // 'password'      => ['required', Password::min(8)->mixedCase()->numbers()],
        // 'nama_lengkap'  => ['nullable'],
        // 'jenis_kelamin' => ['nullable'],
        // 'tempat_lahir'  => ['nullable'],
        // 'tgl_lahir'     => ['nullable', 'date'],
        // 'alamat'        => ['nullable'],
        // 'no_hp'         => ['nullable', 'starts_with:0'],
        // 'no_wa'         => ['nullable', 'starts_with:0']
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return mixed
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function logs()
    {
        return $this->morphMany(Activity::class, 'loggable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
