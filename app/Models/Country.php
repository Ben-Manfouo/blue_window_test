<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'brands_countries', 'country_id', 'brand_id');
    }
}
