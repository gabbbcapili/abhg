<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design', function (Blueprint $table) {
            $table->id();
            $table->string('backgroundColor')->nullable();
            $table->string('backgroundImage')->nullable();
            $table->string('backgroundStyle')->nullable();

            $table->string('sampleImage')->nullable();



            $table->string('backgroundGradientStartColor')->nullable();
            $table->string('backgroundGradientEndColor')->nullable();
            $table->string('backgroundGradientStyle')->nullable();

            $table->string('menuBackgroundColor')->nullable();
            $table->string('menuTextColor');

            $table->string('linkColor');

            $table->string('textColor');
            $table->string('buttonBorderColor')->nullable();
            $table->string('buttonBorderRadius')->nullable();
            $table->string('buttonBackgroundColor');
            $table->string('buttonTextColor');
            $table->string('buttonBorder')->nullable();
            $table->string('themeName')->nullable();
            $table->string('group')->nullable();
            $table->string('headerColor')->nullable();
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
        Schema::dropIfExists('design');
    }
}
