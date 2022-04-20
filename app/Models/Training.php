<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();
     
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('completed', 'asc')->orderBy('for_date', 'asc');
        });
    }
}
