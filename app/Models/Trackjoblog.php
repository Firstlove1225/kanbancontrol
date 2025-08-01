<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trackjoblog extends Model
{
    protected $connection = 'dbvcs';
    protected $table = 'TRACKJOBLOG';
    protected $primaryKey = 'Row_NO';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'KANBAN',
        'CPART_NO',
        'STEP',
        'WORK_NAME',
        'CT',
        'AC_CT',
        'STARTDATE',
        'ENDDATE',
        'STATUS',
        'ACT_STARTDATE',
        'JOB_NO',
        'TYPE_USER',
        'FACTORY',
        'SUPCODE',
        'FNQTY',
        'FNBACKQTY',
        'PART_COATING' => 'string',
        'COMPUTERNAME',
        'FNSAVEQTY',
    ];

    protected $casts = [
        'Row_NO' => 'integer',
        'CT' => 'integer',
        'AC_CT' => 'integer',
        'STARTDATE' => 'datetime',
        'ENDDATE' => 'datetime',
        'ACT_STARTDATE' => 'datetime',
        'FNQTY' => 'integer',
        'FNBACKQTY' => 'integer',
        'FNSAVEQTY' => 'integer',
    ];
}
