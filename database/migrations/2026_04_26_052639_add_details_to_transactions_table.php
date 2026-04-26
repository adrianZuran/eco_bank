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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('shipping_type')->default('Antar Sendiri ke EcoPoint')->after('status');
            $table->text('address')->nullable()->after('shipping_type');
            $table->string('ecopoint_branch')->nullable()->after('address');
            $table->dateTime('pickup_date')->nullable()->after('ecopoint_branch');
            $table->text('notes')->nullable()->after('pickup_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['shipping_type', 'address', 'ecopoint_branch', 'pickup_date', 'notes']);
        });
    }
};
