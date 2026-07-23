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
            Schema::create('guests', function (Blueprint $table) {
                $table->uuid('id')->primary();

                $table->foreignUuid('business_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->string('first_name');

                $table->string('last_name');

                $table->string('email')->nullable();

                $table->string('phone')->nullable();

                $table->date('date_of_birth')->nullable();

                $table->string('gender')->nullable();

                $table->string('nationality')->nullable();

                $table->text('notes')->nullable();

                $table->boolean('is_active')->default(true);

                $table->timestamps();

                $table->softDeletes();

                $table->unique([
                    'business_id',
                    'email'
                ]);
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
