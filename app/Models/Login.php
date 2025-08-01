<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $connection = 'dbvcs';
    protected $table = 'LOGIN';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'LOGIN_ID',
        'NAME',
        'LAST_NAME',
        'PASSWORD',
        'PICTURE',
        'PERMISSION',
        'IS_ACTIVE',
        'CREATED_AT',
    ];

    protected $casts = [
        'ID' => 'integer',
        'IS_ACTIVE' => 'integer',
        'CREATED_AT' => 'datetime',
    ];
}
