<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('finance_id')->constrained('finance')->onDelete('cascade'); // Links to finance table
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to user table
            $table->decimal('amount', 10, 2); // Payment amount
            $table->string('purpose'); // Purpose of payment
            $table->string('gcash_number'); // GCash number used
            $table->string('status')->default('Pending-Approval'); // Status of payment
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};

