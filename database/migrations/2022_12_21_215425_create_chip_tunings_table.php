<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChipTuningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chip_tunings', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');

            $table->unsignedBigInteger('engine_id');
            $table->foreign('engine_id')->references('id')->on('engines');

            $table->string("asset_original")->nullable();
            $table->string("asset_after_tuning")->nullable();
            $table->string("asset_result")->nullable();

            $table->string("couple_original")->nullable();
            $table->string("couple_after_tuning")->nullable();
            $table->string("couple_result")->nullable();

            $table->string("link")->nullable();

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
        Schema::dropIfExists('chip_tunings');
    }
}
