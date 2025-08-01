<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblruncode extends Model
{
    protected $connection = 'dbvcs';
    protected $table = 'tbl_runcode';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'FCCODE_YEAR',
        'FCCODE_Month',
        'FCCODE_No',
        'BOOK',
    ];

    protected $casts = [
        'id' => 'integer',
        'FCCODE_YEAR' => 'integer',
        'FCCODE_No' => 'integer',
    ];
}
