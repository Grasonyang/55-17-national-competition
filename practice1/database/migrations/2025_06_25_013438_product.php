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
            $table->foreignId('company_id')->constrained('companys')->onDelete('cascade'); // 外鍵，指向 users 表
            $table->string('name');
            $table->string('name_in_french')->nullable();
            $table->string('description');
            $table->string('description_in_french');
            $table->string('brand');
            $table->string('origin');
            $table->integer('gross_weight');
            $table->integer('net_content_weight');
            $table->string('weight_unit');
            $table->boolean('is_active')->default(true);
            $table->timestamp('deleted_at')->nullable(); // 軟刪除時間戳記
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
