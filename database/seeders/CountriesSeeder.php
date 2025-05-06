<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/countries_iso2.json'));
        $countries = json_decode($json, true);
        DB::table('countries')->delete();
        foreach ($countries as $country) {
            DB::table('countries')->insert([
                'country_name' => $country['name'],
                'country_iso_2_code' => $country['code'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
