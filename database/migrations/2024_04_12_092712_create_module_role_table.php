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
        Schema::create('module_role', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('roles');
            $table->string('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_role');
    }
};
