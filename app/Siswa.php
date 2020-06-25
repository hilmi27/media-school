<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticable
{
    use Notifiable;

    protected $guard = 'siswa';

    protected $hidden = ['password'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}