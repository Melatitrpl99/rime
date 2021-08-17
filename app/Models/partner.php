<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Partner
 *
 * @package App\Models
 * @version May 18, 2021, 2:03 am UTC
 * @property string $nama
 * @property string $deskripsi
 * @property string $alamat
 * @property string $lokasi
 * @property string $email
 * @property string $no_hp
 * @property string $slug
 * @property int $id
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
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Partner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Partner withoutTrashed()
 * @mixin \Eloquent
 */
class Partner extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'partners';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'lokasi',
        'email',
        'no_hp',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'deskripsi' => 'string',
        'alamat' => 'string',
        'lokasi' => 'string',
        'email' => 'string',
        'no_hp' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'deskripsi' => 'required',
        'alamat' => 'required',
        'lokasi' => 'required',
        'email' => 'required|email',
        'no_hp' => 'required|numeric',
        'slug' => 'nullable'
    ];


}
