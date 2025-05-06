<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $primaryKey = 'brand_id';
    protected $fillable = ['brand_name', 'brand_image', 'rating'];
    protected $hidden = ['deleted_at'];

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'brands_countries', 'brand_id', 'country_id')
            ->orderBy('countries.country_name', 'asc');
    }
}
