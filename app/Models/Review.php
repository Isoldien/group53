<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
	public $incrementing = false;
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

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
