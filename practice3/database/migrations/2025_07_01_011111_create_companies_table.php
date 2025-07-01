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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained('users')->comment('擁有者id');
            $table->string('name')->comment('產品名稱');
            $table->string('address')->comment('公司地址');
            $table->string('phone')->comment('公司電話號碼');
            $table->string('email')->comment('公司電子郵件地址');
            $table->string('contact_address')->comment('聯絡人姓名');
            $table->string('contact_phone')->comment('聯絡人手機號碼');
            $table->string('contact_email')->comment('聯絡人電子郵件地址');
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
        Schema::dropIfExists('companies');
    }
};
