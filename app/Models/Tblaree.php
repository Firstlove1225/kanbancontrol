<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblaree extends Model
{
    protected $connection = 'dbvcs';
    protected $table = 'TBL_AREE';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'CPART_NO',
        'STATUS',
        'CPART_SUP',
    ];
}
