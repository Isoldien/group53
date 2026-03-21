<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;


use App\enums\OrderStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\Rules\Enum;

/**
 * Class Order
 *
 * Represents a customer's order in the system, storing details like total price, status, payment state, and associated user/address.
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

    /**
     * Define custom type casting for model attributes.
     */
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

	/**
	 * Get the user who placed this order.
	 */
	public function user():BelongsTo
	{

		return $this->belongsTo(User::class,"user_id","user_id");



	}

	/**
	 * Get the delivery address associated with this order.
	 */
	public function address():BelongsTo
	{

		return $this->belongsTo(Address::class,"address_id","address_id");



	}

	/**
	 * Get the inventory transactions (stock deductions/additions) linked to this order.
	 */
	public function inventory_transactions():HasMany
	{

		return $this->hasMany(InventoryTransaction::class, "order_id", "order_id");


	}

	/**
	 * Get the individual items purchased within this order.
	 */
	public function order_items():HasMany
	{

		return $this->hasMany(OrderItem::class, "order_id", "order_id");



	}
}
