<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roads', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('pavement_type', 100);
            $table->foreignId('province_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->decimal('budget', 20, 2);
            $table->decimal('cost', 20, 2)->nullable();
            $table->string('executor', 255)->nullable();
            $table->string('executor_contact', 100)->nullable();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->string('supervisor')->nullable();
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
        Schema::dropIfExists('roads');
    }
}
