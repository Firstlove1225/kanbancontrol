<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $connection = 'dbformula';
    protected $table = 'STOCK'; // Assuming the table name is STOCK
    protected $primaryKey = 'FCSKID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'FCSKID',
        'FCCORP',
        'FCWHOUSE',
        'FCPROD',
        'FCLOT',
        'FNQTY',
    ];

    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope(new \App\Scopes\CorpFilterScope);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'FCPROD', 'FCSKID');
    }

    public function whouse()
    {
        return $this->belongsTo(Whouse::class, 'FCWHOUSE', 'FCSKID');
    }
}
