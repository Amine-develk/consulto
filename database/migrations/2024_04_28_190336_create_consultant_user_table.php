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
        Schema::create('consultant_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultant_consultantId');
            $table->unsignedBigInteger('user_userId');
            $table->string('message');
            $table->dateTime('rendez_vous')->nullable();
            $table->string('etat')->default('envoyé');
            $table->timestamps();
            $table->foreign('consultant_consultantId')->references('consultantId')->on('consultants')->onDelete('cascade');
            $table->foreign('user_userId')->references('userId')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultant_user');
    }
};
