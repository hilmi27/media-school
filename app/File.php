<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['title','desc','kelas_id','file'];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
}
