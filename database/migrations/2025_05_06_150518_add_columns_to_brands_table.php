<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table) {

            $table->boolean('is_best_rated')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->string('website_link')->nullable();
            $table->boolean('is_bonus_exclusive')->default(false);
            $table->string('bonus_description')->nullable();
            $table->string('bonus_details')->nullable();
            $table->text('brand_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            //
        });
    }
};
