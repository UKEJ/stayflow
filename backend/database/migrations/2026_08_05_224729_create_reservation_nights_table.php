<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservation_nights', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('reservation_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('stay_date');

            $table->decimal('base_rate', 12, 2);

            $table->decimal('final_rate', 12, 2);

            $table->boolean('posted')
                ->default(false);

            $table->timestamp('posted_at')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->unique([
                'reservation_id',
                'stay_date',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservation_nights');
    }
};