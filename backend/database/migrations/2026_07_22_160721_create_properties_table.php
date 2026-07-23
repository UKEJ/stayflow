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
            Schema::create('properties', function (Blueprint $table) {
                $table->uuid('id')->primary();

                $table->foreignUuid('business_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->string('name');

                $table->string('slug');

                $table->string('type')->default('hotel');

                $table->string('phone')->nullable();

                $table->string('email')->nullable();

                $table->string('country')->default('Nigeria');

                $table->string('state');

                $table->string('city');

                $table->string('address');

                $table->integer('star_rating')->nullable();

                $table->boolean('is_active')->default(true);

                $table->timestamps();

                $table->softDeletes();

                $table->unique([
                    'business_id',
                    'slug'
                ]);
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
