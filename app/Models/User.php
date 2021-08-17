<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 *
 * @package App\Models
 * @version March 2, 2021, 7:57 am UTC
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property int $role_id
 * @property string|null $jenis_kelamin
 * @property string|null $tempat_lahir
 * @property string|null $tgl_lahir
 * @property string|null $alamat
 * @property string|null $no_hp
 * @property string|null $no_wa
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\File|null $avatar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cart[] $carts
 * @property-read int|null $carts_count
 * @property-read \App\Models\UserVerification|null $latestUserVerification
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \App\Models\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shipment[] $shipments
 * @property-read int|null $shipments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Testimony[] $testimonies
 * @property-read int|null $testimonies_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoWa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasFactory;

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
        'role_id',
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
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
        'deleted_at'        => 'datetime',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'          => ['required'],
        'email'         => ['required', 'email', 'unique:users'],
        'password'      => ['required'],
        'role_id'       => ['required'],
        'jenis_kelamin' => ['nullable'],
        'tempat_lahir'  => ['nullable'],
        'tgl_lahir'     => ['nullable', 'date'],
        'alamat'        => ['nullable'],
        'no_hp'         => ['nullable', 'regex:/^(\+62|0)\w+/g'],
        'no_wa'         => ['nullable', 'regex:/^(\+62|0)\w+/g']
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
        'role_id',
        'remember_token',
        'updated_at',
        'deleted_at'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function latestUserVerification()
    {
        return $this->hasOne(UserVerification::class)->latestOfMany();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonies()
    {
        return $this->hasMany(Testimony::class);
    }

    /**
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role()->where('name', $role)->exists();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function avatar()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
