<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Database\Eloquent\Model;

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
 * 
 * @property Collection|Review[] $reviews
 *
 * @package App\Models
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
        ];
    }


		

	public function reviews():HasMany
	{
		return $this->hasMany(Review::class);
	}
    public function contactMessages():HasMany
	{
		return $this->hasMany(ContactMessage::class);
	}
    public function addresses():HasMany
	{
		return $this->hasMany(Address::class);
	}
    public function orders():HasMany
	{
		return $this->hasMany(Order::class);
	}
    public function cart():HasMany
	{
		return $this->hasMany(Cart::class);
	}
    public function returnRequests():HasMany
	{
		return $this->hasMany(ReturnRequest::class);
	}
}
