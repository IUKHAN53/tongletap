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
        Schema::table('health_stats', function (Blueprint $table) {
            $table->renameColumn('depression','depressionScore');
            $table->renameColumn('anxiety','anxietyScore');
            $table->renameColumn('stress','stressScore');
            $table->string('depressionPercentage')->nullable();
            $table->string('depressionStatus')->nullable();
            $table->string('anxietyPercentage')->nullable();
            $table->string('anxietyStatus')->nullable();
            $table->string('stressPercentage')->nullable();
            $table->string('stressStatus')->nullable();
            $table->string('gameId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('health_stats', function (Blueprint $table) {
            //
        });
    }
};
