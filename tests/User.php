<?php

namespace Skoellen\LaravelOccasionManager\Tests;

use Illuminate\Database\Eloquent\Model;
use Skoellen\LaravelOccasionManager\Traits\HasOccasions;

class User extends Model
{
    use HasOccasions;

    public $timestamps = false;

    protected $fillable = ['email'];

    protected $table = 'users';
}
