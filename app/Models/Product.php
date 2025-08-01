<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $connection = 'dbformula';
    protected $table = 'PROD';
    protected $primaryKey = 'FCSKID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'FCSKID',
        'FCCORP',
        'FCTYPE',
        'FCCODE',
        'FCNAME',
        'FCSNAME',
        'FNSTDCOST',
        'FCUM',
        'FNPRICE',
    ];

    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope(new \App\Scopes\CorpFilterScope);
    }

    public function corp()
    {
        return $this->belongsTo(Corp::class, 'FCCORP', 'FCSKID');
    }

    public function um()
    {
        return $this->belongsTo(Um::class, 'FCUM', 'FCSKID');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'FCPROD', 'FCSKID');
    }
}
