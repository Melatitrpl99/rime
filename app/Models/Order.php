<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected $casts = [
        'created_at' => 'immutable_date'
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function scopeIsOngoing(Builder $query): Builder
    {
        return $query->whereIn('status_id', [1, 2, 3, 4]);
    }

    public function scopeAllProcessed(Builder $query): Builder
    {
        return $query->whereIn('status_id', [5, 6, 7]);
    }

    public function scopeNotPaid(Builder $query): Builder
    {
        return $query->doesntHave('orderTransactions');
    }

    public function scopeIsNew(Builder $query): Builder
    {
        return $query->where('status_id', 1);
    }

    public function scopeIsProcessing(Builder $query): Builder
    {
        return $query->whereIn('status_id', [2, 3]);
    }

    public function scopeIsNotProcessed(Builder $query): Builder
    {
        return $query->whereIn('status_id', [6, 7]);
    }

    public function scopeIsShipping(Builder $query): Builder
    {
        return $query->where('status_id', 4);
    }

    public function scopeIsCompleted(Builder $query): Builder
    {
        return $query->where('status_id', 5);
    }

    public function orderTransactions(): HasOne
    {
        return $this->hasOne(OrderTransaction::class);
    }

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
