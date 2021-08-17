<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Report
 *
 * @package App\Models
 * @version May 18, 2021, 2:02 am UTC
 * @property \App\Models\User $user
 * @property string $judul
 * @property string $deskripsi
 * @property boolean $is_import
 * @property string $slug
 * @property unsignedBigInteger $user_id
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\File|null $file
 * @method static \Database\Factories\ReportFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Query\Builder|Report onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereIsImport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Report withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Report withoutTrashed()
 * @mixin \Eloquent
 */
class Report extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'reports';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'judul',
        'deskripsi',
        'is_import',
        'slug',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'judul' => 'string',
        'is_import' => 'boolean',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'judul' => 'required',
        'deskripsi' => 'nullable',
        'is_import' => 'nullable',
        'slug' => 'nullable',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
