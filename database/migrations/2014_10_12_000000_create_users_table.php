<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title', 5)->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->string('password');
            $table->unsignedBigInteger('branch_id')->nullable(); 
            $table->unsignedBigInteger('department_id')->nullable(); 
            $table->unsignedBigInteger('position_id')->nullable();  
            $table->string('employee_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
