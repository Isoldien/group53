<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReturnRequest
 * 
 * @property int $return_id
 * @property int $order_item_id
 * @property int $user_id
 * @property string $reason
 * @property string|null $status
 * @property Carbon $request_date
 * @property Carbon|null $resolution_date
 * @property float|null $refund_amount
 * @property string|null $admin_notes
 * 
 * @property OrderItem $order_item
 * @property User $user
 *
 * @package App\Models
 */
class ReturnRequest extends Model
{
	protected $table = 'return_requests';
	protected $primaryKey = 'return_id';
	public $timestamps = false;

	protected $casts = [
		'order_item_id' => 'int',
		'user_id' => 'int',
		'request_date' => 'datetime',
		'resolution_date' => 'datetime',
		'refund_amount' => 'float'
	];

	protected $fillable = [
		'order_item_id',
		'user_id',
		'reason',
		'status',
		'request_date',
		'resolution_date',
		'refund_amount',
		'admin_notes'
	];

	public function order_item():BelongsTo
	{
		return $this->belongsTo(OrderItem::class);
	}

	public function user():BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
