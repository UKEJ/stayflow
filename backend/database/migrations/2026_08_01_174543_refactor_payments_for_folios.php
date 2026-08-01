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
        Schema::table('payments', function (Blueprint $table) {

            $table->dropConstrainedForeignId('reservation_id');

            $table->foreignUuid('business_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignUuid('folio_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->json('metadata')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            $table->dropColumn('metadata');

            $table->dropConstrainedForeignId('folio_id');

            $table->dropConstrainedForeignId('business_id');

            $table->foreignUuid('reservation_id')
                ->constrained()
                ->cascadeOnDelete();
        });
    }
};