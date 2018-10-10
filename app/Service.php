<?php

namespace App;

class Service extends Model
{
    public function user() {
        
        return $this->belongsTo(User::class); //$service->user->name

    }
}
