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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('position')->nullable();
            $table->string('mobile')->nullable();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('group_id')->nullable();
            $table->string('role_id')->nullable();
            $table->string('email_conn')->nullable();
            $table->string('mobile_conn')->nullable();
            $table->string('sms')->nullable();
            $table->string('is_admin')->nullable();
            $table->string('is_staff')->nullable();
            $table->string('task_start')->nullable();
            $table->string('task_review')->nullable();
            $table->string('task_comp')->nullable();
            $table->string('manage_start')->nullable();
            $table->string('manage_review')->nullable();
            $table->string('manage_comp')->nullable();
            $table->string('manage_end')->nullable();
            $table->string('manage_cancel')->nullable();
            $table->string('pic1')->nullable();
            $table->string('pic2')->nullable();

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
