<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('knns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('gender');
            $table->float('age');
            $table->float('survival_time');
            $table->float('mutations');
            $table->float('mutated_genes');
            $table->float('tumor_stage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knns');
    }
};
