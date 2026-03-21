<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class OrderItem
 *
 * @property int $order_item_id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property float $price_at_purchase
 *
 * @property Order $order
 * @property Product $product
 * @property Collection|ReturnRequest[] $return_requests
 *
 * @package App\Models
 */
class OrderItem extends Model
{
	protected $table = 'order_items';
	protected $primaryKey = 'order_item_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'int',
		'price_at_purchase' => 'float'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'price_at_purchase'
	];

	public function order():BelongsTo
	{
		return $this->belongsTo(Order::class, "order_id", "order_id");
	}

	public function product():BelongsTo
	{
		return $this->belongsTo(Product::class, "product_id", "product_id");
	}

	public function return_requests():HasMany
	{
		return $this->hasMany(ReturnRequest::class, "order_item_id", "order_item_id");
	}
}
