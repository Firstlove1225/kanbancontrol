<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOrderpl extends Model
{
    protected $connection = 'dbvcs';
    protected $table = 'JOBORDERPL';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'PART_NO',
        'PLANT',
        'NQTY',
        'OPEN_DATE',
        'MTM_DATE',
        'USER_ID',
        'STATUS',
        'RMTM_DATE',
        'JOB_NO',
    ];

    protected $casts = [
        'ID' => 'integer',
        'OPEN_DATE' => 'datetime',
        'MTM_DATE' => 'datetime',
        'USER_ID' => 'integer',
        'STATUS' => 'integer',
        'RMTM_DATE' => 'datetime',
    ];
}
