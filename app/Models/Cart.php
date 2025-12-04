<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * 
 * @property int $cart_id
 * @property int $user_id
 * @property Carbon $date_created
 * @property float|null $total_amount
 * @property string|null $status
 * 
 * @property User $user
 * @property Collection|CartItem[] $cart_items
 *
 * @package App\Models
 */
class Cart extends Model
{
	protected $table = 'carts';
	protected $primaryKey = 'cart_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'date_created' => 'datetime',
		'total_amount' => 'float'
	];

	protected $fillable = [
		'user_id',
		'date_created',
		'total_amount',
		'status'
	];

	public function user():BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function cart_items():HasMany
	{
		return $this->hasMany(CartItem::class);
	}
}
