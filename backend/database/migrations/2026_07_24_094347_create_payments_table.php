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

                $table->foreignUuid('reservation_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->string('reference')->unique();

                $table->decimal('amount', 12, 2);

                $table->string('currency', 3)->default('NGN');

                $table->enum('method', [
                    'cash',
                    'card',
                    'bank_transfer',
                    'mobile_money',
                    'online',
                    'other'
                ]);

                $table->enum('status', [
                    'pending',
                    'successful',
                    'failed',
                    'refunded'
                ])->default('pending');

                $table->timestamp('paid_at')->nullable();

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
        Schema::dropIfExists('payments');
    }
};
