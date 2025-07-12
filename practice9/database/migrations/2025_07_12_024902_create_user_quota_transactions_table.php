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
        Schema::create('user_quota_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained('users')->onDelete("restrict");
            $table->integer("value");
            $table->enum("reason",["CREATE_USER","RECHARGE","CONSUME"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_quota_transactions');
    }
};
