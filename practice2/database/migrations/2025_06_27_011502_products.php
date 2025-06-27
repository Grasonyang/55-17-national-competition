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
        Schema::create('products', function (Blueprint $table) {
            $table->string('gtin', 14)->primary();
            $table->foreignId('company_id')->constrained('companys')->onDelete('cascade')->default(null)->nullable();
            $table->string('name')->nullable();
            $table->string('name_in_french')->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('description_in_french', 1000)->nullable();
            $table->string('brand')->nullable();
            $table->string('origin')->nullable();
            $table->integer('gross_weight')->default(0);
            $table->integer('net_content_weight')->default(0);
            $table->string('weight_unit')->default("g");
            $table->boolean('status')->default(true);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->string('product_id', 14);
            $table->foreign('product_id')->references('gtin')->on('products')->onDelete('cascade');
            $table->string("image_url")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_images');
        
    }
};
