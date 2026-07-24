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
            Schema::create('reservations', function (Blueprint $table) {
                $table->uuid('id')->primary();

                $table->foreignUuid('business_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->foreignUuid('property_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->foreignUuid('guest_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->foreignUuid('unit_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->string('reference')->unique();

                $table->date('check_in');

                $table->date('check_out');

                $table->unsignedTinyInteger('adults')->default(1);

                $table->unsignedTinyInteger('children')->default(0);

                $table->decimal('total_amount', 12, 2)->default(0);

                $table->enum('status', [
                    'pending',
                    'confirmed',
                    'checked_in',
                    'checked_out',
                    'cancelled',
                    'completed',
                ])->default('pending');

                $table->text('notes')->nullable();

                $table->timestamps();

                $table->softDeletes();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
