<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Category
 * 
 * @property int $category_id
 * @property string|null $category_name
 * @property string|null $description
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Category extends Model
{
	use HasFactory;
	protected $table = 'categories';
	protected $primaryKey = 'category_id';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int'
	];

	protected $fillable = [
		'category_name',
		'description'
	];

	public function products():HasMany
	{
		return $this->hasMany(Product::class);
	}
}
