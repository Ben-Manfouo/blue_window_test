<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    protected $primaryKey = 'brand_id';
    protected $fillable = ['brand_name', 'brand_image', 'rating'];

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'brands_countries', 'brand_id', 'country_id');
    }
}
