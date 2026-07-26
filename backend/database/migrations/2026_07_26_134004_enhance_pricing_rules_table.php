<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pricing_rules', function (Blueprint $table) {

            $table->enum('rule_type', [
                'price_adjustment',
                'validation',
            ])->default('price_adjustment')->after('name');

            $table->enum('operator', [
                'add',
                'subtract',
                'multiply',
                'replace',
            ])->nullable()->after('adjustment_type');

            $table->json('conditions')->nullable()->after('adjustment_value');

            $table->date('starts_on')->nullable()->after('conditions');

            $table->date('ends_on')->nullable()->after('starts_on');

        });
    }

    public function down(): void
    {
        Schema::table('pricing_rules', function (Blueprint $table) {

            $table->dropColumn([
                'rule_type',
                'operator',
                'conditions',
                'starts_on',
                'ends_on',
            ]);

        });
    }
};