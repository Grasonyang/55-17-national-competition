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
        Schema::create('companys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // 外鍵，指向 users 表
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_phone');
            $table->string('company_email');
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('owner_email');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->boolean('is_active')->default(true); // 是否啟用，否->隱藏
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companys');
    }
};
