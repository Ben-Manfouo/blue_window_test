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
        Schema::create('brands_countries', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('brand_id')
                ->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('country_id')
                ->on('countries')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands_countries');
    }
};
