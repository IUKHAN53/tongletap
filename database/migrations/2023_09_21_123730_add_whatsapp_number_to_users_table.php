<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table
                ->string('whatsapp_number')
                ->nullable()
                ->comment('WhatsApp number of the user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'whatsapp_number')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->dropColumn('whatsapp_number');
                });
            }
        });
    }
};
