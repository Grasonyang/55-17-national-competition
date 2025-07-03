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
            $table->string('gtin',14)->primary();
            $table->foreignId('company_id')->constrained('companies')->onDelete('restrict');
            $table->string('name');
            $table->string('name_in_f');
            $table->string('description');
            $table->string('description_in_f');
            $table->string('brand');
            $table->string('origin');
            $table->integer('gross_weight');
            $table->integer('net_content_weight');
            $table->string('unit');
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
