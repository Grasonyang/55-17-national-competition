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
            $table->string('name')->unique();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('owner_name')->unique();
            $table->string('owner_address')->nullable();
            $table->string('owner_email')->unique();
            $table->string('contact_name')->unique();
            $table->string('contact_address')->nullable();
            $table->string('contact_email')->unique();
            $table->boolean("status")->default(true);
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
