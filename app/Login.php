<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

use DateTime;
use DateTimeZone;
use Log;



class Login extends Authenticatable
{

    use HasApiTokens, Notifiable;
    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = ['name','email', 'cpf','password', 'active', 'deleted_at', 'created_at', 'updated_at'];
    //
}
