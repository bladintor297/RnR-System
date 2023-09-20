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
        Schema::table('complain', function (Blueprint $table) {
            $table->integer('userID')->after('name');
            $table->integer('status')->default(0)->after('appointment_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('complain', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
