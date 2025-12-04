<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
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
	use HasFactory, Notifiable, TwoFactorAuthenticatable;
	protected $table = 'users';
	protected $primaryKey = 'user_id';

   



class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }


		

	public function reviews()
	{
		return $this->hasMany(Review::class);
	}
}
