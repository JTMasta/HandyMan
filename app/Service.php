<?php

namespace App;

class Service extends Model
{
    public function user() {
        
        $this->belongsTo(User::class); //$service->user->name

    }
}
