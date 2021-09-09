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
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

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
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     */
    public function getJWTIdentifier()
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
        switch ($this->jk) {
            case 'l':
                return 'Laki-laki';
            case 'p':
                return 'Perempuan';
            default:
                return 'Tidak diketahui';
        }
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
