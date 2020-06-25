<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
    public function files()
    {
        return $this->belongsToMany(File::class);
    }
}
