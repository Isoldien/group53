<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Review
 * 
 * @property int $review_id
 * @property int|null $product_id
 * @property int|null $rating
 * @property string|null $comment
 * @property Carbon|null $review_date
 * @property int $user_id
 * 
 * @property Product|null $product
 * @property User $user
 *
 * @package App\Models
 */
class Review extends Model
{
	protected $table = 'reviews';
	protected $primaryKey = 'review_id';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'review_id' => 'int',
		'product_id' => 'int',
		'rating' => 'int',
		'review_date' => 'datetime',
		'user_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'rating',
		'comment',
		'review_date',
		'user_id'
	];

	public function product():BelongsTo
	{
		return $this->belongsTo(Product::class, 'product_id', 'product_id');
	}

	public function user():BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id', 'user_id');
	}
}
