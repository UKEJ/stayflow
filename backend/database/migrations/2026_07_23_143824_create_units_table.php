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
            Schema::create('units', function (Blueprint $table) {
                $table->uuid('id')->primary();

                $table->foreignUuid('property_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->foreignUuid('unit_type_id')
                    ->constrained()
                    ->cascadeOnDelete();

                // Client-defined identifier
                $table->string('identifier');

                // Optional display name
                $table->string('name')->nullable();

                // General availability
                $table->boolean('is_active')->default(true);

                $table->timestamps();

                $table->softDeletes();

                $table->unique([
                    'property_id',
                    'identifier'
                ]);
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
