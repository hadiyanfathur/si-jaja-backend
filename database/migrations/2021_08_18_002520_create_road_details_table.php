<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('cost', 20, 2);
            $table->string('executor', 255);
            $table->string('executor_contact', 100);
            $table->date('start_at');
            $table->date('end_at');
            $table->string('supervisor');
            $table->foreignId('road_id');
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
        Schema::dropIfExists('road_details');
    }
}
