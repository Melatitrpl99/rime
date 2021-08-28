<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Partner
 *
 * @property int $id
 * @property string $nama
 * @property string|null $deskripsi
 * @property string $alamat
 * @property string $lokasi
 * @property string $email
 * @property string $no_telp
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\PartnerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newQuery()
 * @method static \Illuminate\Database\Query\Builder|Partner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereLokasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereNoTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Partner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Partner withoutTrashed()
 * @mixin \Eloquent
 */
class Partner extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'lokasi',
        'email',
        'no_telp',
    ];

    protected $hidden = [
        'deleted_at'
    ];
}
