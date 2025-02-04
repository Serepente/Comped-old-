<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('finance', function (Blueprint $table) {
            $table->string('status')->default('Pending')->after('amount');
        });
    }

    public function down()
    {
        Schema::table('finance', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
