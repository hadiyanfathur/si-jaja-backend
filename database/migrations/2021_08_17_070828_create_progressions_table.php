<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progressions', function (Blueprint $table) {
            $table->id();
            $table->decimal('length', 10, 2);
            $table->string('uom_length', 50);
            $table->decimal('width', 10, 2);
            $table->string('uom_width', 50);
            $table->text('problem');
            $table->string('problem_picture', 100);
            $table->string('status', 100);
            $table->string('approval_status', 100);
            $table->foreignId('road_id')->constrained();
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
        Schema::dropIfExists('progressions');
    }
}
