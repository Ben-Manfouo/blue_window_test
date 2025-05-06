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
        $brands = Brand::all();
        $countryIds = Country::pluck('country_id');

        foreach ($brands as $brand) {
            // Attach 1 to 5 random countries to each brand
            $randomCountryIds = $countryIds->random(rand(1, 5))->all();
            $brand->countries()->attach($randomCountryIds);
        }
    }
}
