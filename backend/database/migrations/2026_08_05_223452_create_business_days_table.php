<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('business_days', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('business_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('business_date');

            $table->boolean('is_closed')
                ->default(false);

            $table->timestamp('closed_at')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->unique([
                'business_id',
                'business_date',
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_days');
    }
};
