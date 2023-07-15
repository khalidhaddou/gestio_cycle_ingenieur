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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('Code');
            $table->string('Nom');
            $table->string('Description');
            $table->integer('nbr_H');
            $table->string('semestre');
            $table->unsignedBigInteger('id_enseignant');
            $table->foreign('id_enseignant')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module');
    }
};
