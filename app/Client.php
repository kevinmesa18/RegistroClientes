<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function City() {
        return $this->belongsTo(City::class);
    }
}
