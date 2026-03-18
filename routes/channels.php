<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('stock-channel', function (User $user) {

    return $user->role->value === \App\enums\UserRole::Admin->value;

});

