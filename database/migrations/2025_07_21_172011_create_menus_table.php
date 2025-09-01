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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->string('title_en', 250)->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 - Inactive, 1 - Active');
            $table->BigInteger('parent_id')->nullable()->unsigned();
            $table->tinyInteger('location')->nullable()->unsigned()->comment('0-header, 1-footer')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
