<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * 
 * @property int $address_id
 * @property int $user_id
 * @property string $address_line
 * @property string $city
 * @property string $postal_code
 * @property string $country
 * @property bool|null $is_default
 * 
 * @property User $user
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Address extends Model
{
	protected $table = 'addresses';
	protected $primaryKey = 'address_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'is_default' => 'bool'
	];

	protected $fillable = [
		'user_id',
		'address_line',
		'city',
		'postal_code',
		'country',
		'is_default'
	];

	public function user():BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function orders():HasMany
	{
		return $this->hasMany(Order::class);
	}
}
