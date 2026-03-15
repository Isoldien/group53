<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMessage extends Model
{
    //
    protected $table = 'admin_messages';
    protected $primaryKey = 'message_id';

    protected $fillable = [
        'message',
        'title',
    ];

    protected function casts(): array {
        return [
            "message_id" => "int",
            "message" => "string",
            "title" => "string",
            "created_at" => "datetime",
            "updated_at" => "datetime",

        ];
    }
    
}
