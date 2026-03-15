<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;


use App\enums\OrderStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Enum;

/**
 * Class Order
 *
 * @property int $order_id
 * @property int $user_id
 * @property int $address_id
 * @property Carbon $order_date
 * @property float $total_price
 * @property Enum $status
 * @property string $payment_method
 * @property string|null $payment_status
 * @property string|null $tracking_number
 * @property User $user
 * @property Address $address
 * @property Collection|InventoryTransaction[] $inventory_transactions
 * @property Collection|OrderItem[] $order_items
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'order_id';
	public $timestamps = false;

    protected function casts(): array
    {
        return [
            'user_id' => 'int',
            'address_id' => 'int',
            'order_date' => 'datetime',
            'total_price' => 'float',
            'status' => OrderStatus::class,
        ];
    }
	protected $fillable = [
		'user_id',
		'address_id',
		'order_date',
		'total_price',
		'status',
		'payment_method',
		'payment_status',
		'tracking_number'
	];

	public function user():BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function address():BelongsTo
	{
		return $this->belongsTo(Address::class);
	}

	public function inventory_transactions():HasMany
	{
		return $this->hasMany(InventoryTransaction::class);
	}

	public function order_items():HasMany
	{
		return $this->hasMany(OrderItem::class);
	}
}
