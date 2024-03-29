<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasFactory, HasRoles, HasApiTokens;

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
        'tgl_lahir' => 'datetime:Y-m-d',
    ];

    protected $dateFormat = 'Y-m-d';

    public function setJenisKelaminAttribute(string $value)
    {
        if ($value == 'Laki-laki') {
            $this->attributes['jk'] = 'l';
        } else {
            $this->attributes['jk'] = 'p';
        }
    }

    public function getJenisKelaminAttribute()
    {
        return $this->attributes['jk'] == 'l' ? 'Laki-laki' : 'Perempuan';
    }

    /**
     * Specifies the user's FCM token
     *
     * @return string|array
     */
    public function routeNotificationForFcm()
    {
        return $this->getDeviceTokens();
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

    public function userVerification(): HasOne
    {
        return $this->hasOne(UserVerification::class);
    }

    public function defaultUserShipment(): HasOne
    {
        return $this->hasOne(UserShipment::class)->where('is_default', true);
    }

    public function userShipments(): HasMany
    {
        return $this->hasMany(UserShipment::class);
    }

    public function likedProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_likes')
            ->withPivot('liked_at')
            ->wherePivotNotNull('liked_at');
    }

    public function avatar(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
