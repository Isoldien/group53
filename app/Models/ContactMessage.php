<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactMessage
 * 
 * @property int $message_id
 * @property int|null $user_id
 * @property string|null $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string|null $status
 * @property Carbon $date_sent
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class ContactMessage extends Model
{
	protected $table = 'contact_messages';
	protected $primaryKey = 'message_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'date_sent' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'name',
		'email',
		'subject',
		'message',
		'status',
		'date_sent'
	];

	public function user():BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
