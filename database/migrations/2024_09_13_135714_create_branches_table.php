<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();;
            $table->string('branch_code');
            $table->string('branch_name');
            $table->string('branch_short_name');
            $table->string('branch_address')->nullable();
            $table->string('branch_phone_no')->nullable();
            $table->boolean('branch_active')->default('0');
            $table->decimal('latitude', 10, 8)->nullable();   // Latitude column with precision
            $table->decimal('longitude', 11, 8)->nullable(); 
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
        Schema::dropIfExists('branches');
    }
}
