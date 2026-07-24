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
            Schema::create('pricing_rules', function (Blueprint $table) {

                $table->uuid('id')->primary();

                $table->foreignUuid('rate_plan_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->foreignUuid('season_id')
                    ->nullable()
                    ->constrained()
                    ->nullOnDelete();

                $table->string('name');

                $table->enum('adjustment_type', [
                    'fixed',
                    'percentage',
                ]);

                $table->decimal('adjustment_value', 12, 2);

                $table->integer('priority')->default(1);

                $table->boolean('is_active')->default(true);

                $table->timestamps();

                $table->softDeletes();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_rules');
    }
};
