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
        Schema::create('copouns', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->integer('discount');
            $table->timestamps('start_date');
            $table->timestamps('end_date');
            $table->enum('discount_type',[0,1]);
            $table->integer('max_discount_value');
            $table->integer('min_order_value');
            $table->integer('max_usage_per_user');
            $table->integer('max_usage_in_general');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('copouns');
    }
};
