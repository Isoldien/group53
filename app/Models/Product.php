<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $product_id
 * @property int $category_id
 * @property string $product_name
 * @property string $description
 * @property float $price
 * @property int $stock_quantity
 * @property string|null $image_url
 * @property string|null $brand
 * @property string $pet_type
 * @property Carbon $date_added
 * @property bool|null $is_active
 * 
 * @property Category $category
 * @property Collection|Review[] $reviews
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'product_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'category_id' => 'int',
		'price' => 'float',
		'stock_quantity' => 'int',
		'date_added' => 'datetime',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'category_id',
		'product_name',
		'description',
		'price',
		'stock_quantity',
		'image_url',
		'brand',
		'pet_type',
		'date_added',
		'is_active'
	];

	public function category():BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	public function reviews():HasMany
	{
		return $this->hasMany(Review::class);
	}
}
