<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = Country::all();
        $brandIds = Brand::pluck('brand_id');

        foreach ($countries as $country) {
            // Attach 1 to 5 random countries to each brand
            $randomBrandIds = $brandIds->random(rand(6, 15))->all();
            $country->brands()->attach($randomBrandIds);
        }
    }
}
