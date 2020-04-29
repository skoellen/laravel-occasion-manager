<?php

namespace Skoellen\LaravelOccasionManager\Traits;

use Skoellen\LaravelOccasionManager\Models\Occasion;

trait HasOccasions
{
    /**
     * The model can have many occasions
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function occasions()
    {
        return $this->morphMany(Occasion::class, 'occasionable');
    }
}
