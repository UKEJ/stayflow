<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {

            $table->foreignUuid('rate_plan_id')
                ->nullable()
                ->after('unit_id')
                ->constrained()
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {

            $table->dropConstrainedForeignId('rate_plan_id');

        });
    }
};