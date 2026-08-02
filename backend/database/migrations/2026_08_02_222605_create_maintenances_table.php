<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->foreignUuid('business_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('unit_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('reference')->unique();

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('priority')->default('medium');

            $table->string('status')->default('open');

            $table->timestamp('reported_at');

            $table->timestamp('resolved_at')->nullable();

            $table->json('metadata')->nullable();

            $table->timestamps();

            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};