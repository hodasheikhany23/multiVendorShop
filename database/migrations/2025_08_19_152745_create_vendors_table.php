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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('l_name');
            $table->string('name')->nullable()->default(null);
            $table->string('l_name_en')->nullable()->default(null);
            $table->string('city');
            $table->string('province');
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_name_en')->nullable()->default(null);
            $table->string('phone');
            $table->string('telegram')->nullable();
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('eata')->nullable();
            $table->tinyInteger('status')->unsigned()->default(1)->comment('0 - Inactive, 1 - Active');
            $table->tinyInteger('rating')->unsigned()->default(0);
//            $table->unsignedBigInteger('category_id')->nullable();
//            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
