<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    use HasFactory;

    protected $connection = 'dbformula';
    protected $table = 'CORP';
    protected $primaryKey = 'FCSKID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'FCSKID',
        'FCCODE',
        'FCNAME',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'FCCORP', 'FCSKID');
    }
}
