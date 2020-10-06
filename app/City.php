<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function Clients() {
        return $this->hasMany(Client::class);
    }
}
