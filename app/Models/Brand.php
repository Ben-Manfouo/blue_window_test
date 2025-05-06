<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'brands_countries', 'brand_id', 'country_id');
    }
}
