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
        Schema::create('pacient_medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Pacient::class, 'pacient_id')->constrained();
            $table->foreignIdFor(\App\Models\Medicine::class, 'medicine_id')->constrained();
            $table->unsignedInteger('day_of_week');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacient_medicines');
    }
};
