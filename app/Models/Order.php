<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Order.
 *
 * @property int $id
 * @property string $nomor
 * @property string|null $pesan
 * @property int|null $total
 * @property int|null $biaya_pengiriman
 * @property int|null $berat
 * @property string|null $kode_resi
 * @property int|null $discount_id
 * @property int $status_id
 * @property int $user_id
 * @property int $user_shipment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Discount|null $discount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \App\Models\File|null $latestInvoice
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Models\Status $status
 * @property-read \App\Models\User $user
 * @property-read \App\Models\UserShipment $userShipment
 * @method static \Database\Factories\OrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Query\Builder|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBerat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBiayaPengiriman($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereKodeResi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePesan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserShipmentId($value)
 * @method static \Illuminate\Database\Query\Builder|Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Order withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\PaymentMethod $paymentMethod
 */
class Order extends Model
{
    use SoftDeletes, HasFactory;

    public $fillable = [
        'nomor',
        'pesan',
        'total',
        'biaya_pengiriman',
        'berat',
        'kode_resi',
        'discount_id',
        'status_id',
        'user_shipment_id',
        'payment_method_id',
        'user_id',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function userShipment(): BelongsTo
    {
        return $this->belongsTo(UserShipment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_details')
            ->withPivot(OrderDetail::$pivotColumns)
            ->using(OrderDetail::class);
    }

    public function invoices(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function latestInvoice(): MorphOneOrMany
    {
        return $this->morphOne(File::class, 'fileable')->latestOfMany();
    }
}
