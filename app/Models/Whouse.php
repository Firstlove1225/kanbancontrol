<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whouse extends Model
{
    use HasFactory;

    protected $connection = 'dbformula';
    protected $table = 'WHOUSE';
    protected $primaryKey = 'FCSKID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'FCSKID',
        'FCCORP',
        'FCCODE',
        'FCNAME',
    ];

    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope(new \App\Scopes\CorpFilterScope);
    }

    public function scopeByFcCode($query)
    {
        return $query->whereIn('FCCODE', ['003', '001', '019', '005']);
    }
}
