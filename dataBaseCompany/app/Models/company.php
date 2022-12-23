<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function employee()
    {
        return $this->hasMany(employee::class);
    }
}
