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
        Schema::table('waste_categories', function (Blueprint $table) {
            $table->string('category')->nullable()->after('name');
            $table->string('sub_category')->nullable()->after('category');
            $table->string('trend')->default('stabil')->after('price_per_kg');
            $table->string('trend_amount')->nullable()->after('trend');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('waste_categories', function (Blueprint $table) {
            $table->dropColumn(['category', 'sub_category', 'trend', 'trend_amount']);
        });
    }
};
