<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CartItem
 * 
 * @property int $cart_item_id
 * @property int $cart_id
 * @property int $product_id
 * @property int $quantity
 * @property float $subtotal
 * 
 * @property Cart $cart
 * @property Product $product
 *
 * @package App\Models
 */
class CartItem extends Model
{
	protected $table = 'cart_items';
	protected $primaryKey = 'cart_item_id';
	public $timestamps = false;

	protected $casts = [
		'cart_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'int',
		'subtotal' => 'float'
	];

	protected $fillable = [
		'cart_id',
		'product_id',
		'quantity',
		'subtotal'
	];

	public function cart():BelongsTo
	{
		return $this->belongsTo(Cart::class);
	}

	public function product():BelongsTo
	{
		return $this->belongsTo(Product::class);
	}
}
