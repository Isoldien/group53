<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\enums\UserRole;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\Rules\Enum;

/**
 * Class User
 *
 * @property int $user_id
 * @property string $full_name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property  Enum $role
 * @property Collection|Review[] $reviews
 * @package App\Models
 */
/**
 * Model representing a registered user, managing their profile data and authentication.
 */
class User extends Authenticatable implements MustVerifyEmail
{
	use HasFactory, Notifiable;
	protected $table = 'users';
	protected $primaryKey = 'user_id';






    /**
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
/**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
            'role' => UserRole::class
        ];
    }




	public function reviews():HasMany
	{

		return $this->hasMany(Review::class, "user_id", "user_id");
	}
    public function contactMessages():HasMany
	{
		return $this->hasMany(ContactMessage::class, "user_id", "user_id");


	}

    public function addresses():HasOne
	{

		return $this->hasOne(Address::class, "user_id", "user_id");
	}
    public function orders():HasMany
	{
		return $this->hasMany(Order::class, "user_id", "user_id");


	}

    public function cart():HasOne
	{

		return $this->hasOne(Cart::class, "user_id", "user_id");
	}
    public function returnRequests():HasMany
	{
		return $this->hasMany(ReturnRequest::class, "user_id", "user_id");


	}

}
