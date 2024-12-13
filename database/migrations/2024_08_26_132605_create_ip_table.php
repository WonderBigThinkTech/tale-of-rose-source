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
        Schema::create('ip', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->unique();
            $table->string('username')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('os')->nullable();
            $table->string('processor_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ip');
    }
};
