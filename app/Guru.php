<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
class Guru extends Authenticable
{
    protected $guard = 'guru';

    protected $hidden = ['password'];

}
