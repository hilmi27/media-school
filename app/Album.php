<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
