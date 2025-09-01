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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_type_id');
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->string('activity_model')->comment('user_product_menu and ...');
            $table->string('activity_name')->comment('login_update_create and ...');
            $table->string('activity_description')->nullable();
            $table->string('user_agent')->nullable();
            $table->ipAddress('user_ip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
