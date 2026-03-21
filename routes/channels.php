<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;


Broadcast::channel('stock-channel', function (User $user) {

    return $user->role->value === \App\enums\UserRole::Admin->value;

});



