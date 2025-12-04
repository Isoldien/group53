<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InventoryTransaction
 * 
 * @property int $transaction_id
 * @property int $product_id
 * @property int|null $order_id
 * @property int $user_id
 * @property int $quantity_change
 * @property string $type
 * @property string|null $note
 * @property Carbon $created_at
 * 
 * @property Product $product
 * @property Order|null $order
 * @property User $user
 *
 * @package App\Models
 */
class InventoryTransaction extends Model
{
	protected $table = 'inventory_transactions';
	protected $primaryKey = 'transaction_id';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'order_id' => 'int',
		'user_id' => 'int',
		'quantity_change' => 'int'
	];

	protected $fillable = [
		'product_id',
		'order_id',
		'user_id',
		'quantity_change',
		'type',
		'note'
	];

	public function product():BelongsTo
	{
		return $this->belongsTo(Product::class);
	}

	public function order():BelongsTo
	{
		return $this->belongsTo(Order::class);
	}

	public function user():BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
