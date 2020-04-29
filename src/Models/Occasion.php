<?php

namespace Skoellen\LaravelOccasionManager\Models;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $table = 'occasions';

    protected $guarded = ['id'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'active'  => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function occasionable()
    {
        return $this->morphTo();
    }
}
