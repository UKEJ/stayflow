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
        Schema::create('payments', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('business_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('folio_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('reference')->unique();

            $table->decimal('amount', 12, 2);

            $table->string('currency', 3)->default('NGN');

            $table->enum('method', [
                'cash',
                'card',
                'bank_transfer',
                'pos',
                'wallet',
                'mobile_money',
                'other',
            ]);

            $table->enum('status', [
                'pending',
                'completed',
                'failed',
                'refunded',
                'voided',
            ])->default('completed');

            $table->timestamp('paid_at');

            $table->text('notes')->nullable();

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
        Schema::dropIfExists('payments');
    }
};