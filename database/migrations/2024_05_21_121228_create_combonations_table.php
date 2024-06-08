<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('combonations', function (Blueprint $table) {
            $table->id();
            $table -> string('test_id', 100)->nullable();
            $table -> string('product_a', 200)->nullable();
            $table -> string('product_b', 200)->nullable();
            $table -> integer('combonation_frequency')->default(0);
            $table -> float('support')->default(0);
            $table -> float('confidence')->default(0);
            $table -> integer('active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combonations');
    }
};
