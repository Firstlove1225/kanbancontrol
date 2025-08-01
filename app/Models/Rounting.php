<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rounting extends Model
{
    protected $connection = 'dbvcs';
    protected $table = 'ROUTING';
    protected $primaryKey = 'ROUTING_ID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ROUTING_ID',
        'STEP',
        'PART_NO',
        'WORK_ID',
        'WORK_NAME',
        'CT',
        'S_VISABLE',
    ];

    protected $casts = [
        'STEP' => 'integer',
        'WORK_ID' => 'integer',
        'CT' => 'integer',
        'S_VISABLE' => 'integer',
    ];
}
