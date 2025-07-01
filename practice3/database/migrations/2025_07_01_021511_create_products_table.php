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
            $table->string('gtin',14)->primary()->comment('GTIN（全球貿易項目編號）');
            $table->foreignId('company_id')->constrained('companies')->comment('公司ID');
            $table->string('name')->comment('產品名稱');
            $table->string('name_in_French')->comment('產品法語名稱');
            $table->string('description',1000)->comment('描述');
            $table->string('description_in_French')->comment('法語描述');
            $table->string('brand')->comment('產品品牌名稱');
            $table->string('origin')->comment('產品原產國');
            $table->integer('gross_weight')->comment('產品總重（包含包裝）');
            $table->integer('net_content_weight')->comment('產品淨重');
            $table->string('weight_unit')->comment('產品重量單位');
            $table->enum('is_active', [1,0])->default(1)->comment('是否啟用');
            $table->softDeletes()->comment('軟刪除時間戳記');
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
