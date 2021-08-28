<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $nik
 * @property string $nama_lengkap
 * @property string|null $jk
 * @property string|null $tempat_lahir
 * @property \Illuminate\Support\Carbon|null $tgl_lahir
 * @property string|null $alamat
 * @property string|null $no_hp
 * @property string|null $no_wa
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\File|null $avatar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cart[] $carts
 * @property-read int|null $carts_count
 * @property string $jenis_kelamin
 * @property-read \App\Models\UserVerification|null $latestUserVerification
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Testimony[] $testimonies
 * @property-read int|null $testimonies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserVerification[] $userVerifications
 * @property-read int|null $user_verifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoWa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasFactory, HasRoles;

    public $fillable = [
        'email',
        'password',
        'nik',
        'nama_lengkap',
        'jk',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'no_hp',
        'no_wa',
    ];

    protected $hidden = [
        'email_verified_at',
        'password',
        'remember_token',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
        // 'password'  => 'encrypted',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function setJenisKelaminAttribute(string $value)
    {
        if (strtolower(trim($value)) == 'laki-laki') {
            $this->attributes['jk'] = 'l';
        }

        if (strtolower(trim($value)) == 'perempuan') {
            $this->attributes['jk'] = 'p';
        }
    }

    public function getJenisKelaminAttribute(): string
    {
        return $this->jk == 'l' ? 'Laki-laki' : 'Perempuan';
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function testimonies(): HasMany
    {
        return $this->hasMany(Testimony::class);
    }

    public function userVerifications(): HasMany
    {
        return $this->hasMany(UserVerification::class);
    }

    public function latestUserVerification(): HasOneOrMany
    {
        return $this->hasOne(UserVerification::class)->latestOfMany();
    }

    public function avatar(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
