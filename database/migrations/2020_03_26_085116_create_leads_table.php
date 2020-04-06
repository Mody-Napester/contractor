<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('company_name')->nullable();
            $table->string('owner')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('contact_engineer')->nullable();
            $table->string('title')->nullable();
            $table->string('class')->nullable();
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->string('notes')->nullable();
            $table->integer('user_id')->nullable(); // Sales 2
            $table->integer('transfer_to')->nullable();
            $table->integer('status')->nullable(); // 1,2,3
            $table->integer('duplicated_with')->nullable();
            $table->integer('created_by')->nullable(); // Sales 1
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
