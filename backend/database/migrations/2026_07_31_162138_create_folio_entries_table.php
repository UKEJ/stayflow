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
        Schema::create('folio_entries', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('folio_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->dateTime('posted_at');

            $table->enum('type', [
                'charge',
                'payment',
                'discount',
                'tax',
                'refund',
                'adjustment',
            ]);

            $table->string('category');

            $table->string('description');

            $table->decimal('amount', 12, 2);

            $table->string('reference')->nullable();

            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folio_entries');
    }
};
