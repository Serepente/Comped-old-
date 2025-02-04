<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('borrows', function (Blueprint $table) {
            $table->string('borrowed_item')->after('school_id');
            $table->integer('quantity')->after('borrowed_item');
        });
    }

    public function down()
    {
        Schema::table('borrows', function (Blueprint $table) {
            $table->dropColumn(['borrowed_item', 'quantity']);
        });
    }
};
