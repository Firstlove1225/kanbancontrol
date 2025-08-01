<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Um extends Model
{
    use HasFactory;

    protected $connection = 'dbformula';
    protected $table = 'UM';
    protected $primaryKey = 'FCSKID';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'FCSKID',
        'FCCODE',
        'FCNAME',
        'FCCORP',
    ];

    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope(new \App\Scopes\CorpFilterScope);
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'FCUM', 'FCSKID');
    }
}
