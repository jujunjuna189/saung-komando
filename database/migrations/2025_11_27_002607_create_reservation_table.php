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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('facility_id');
            $table->string('name')->nullable();
            $table->string('telp')->nullable();
            $table->integer('total_guest');
            $table->datetimes('check_in');
            $table->datetimes('check_out');
            $table->text('note')->nullable();
            $table->text('extra_bed')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
