<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kanban extends Model
{
    protected $connection = 'dbvcs';
    protected $table = 'KANBAN';
    protected $primaryKey = 'CPART_NO';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'CPART_NO',
        'CFORM',
        'CCOATING',
        'CTO',
        'CREV',
        'CISSUED',
        'CPACK',
        'CPICTURE',
        'NQTY',
        'CMODEL',
        'CTYPE',
        'NOPTION',
    ];

    protected $casts = [
        'CCOATING' => 'boolean',
    ];
}
