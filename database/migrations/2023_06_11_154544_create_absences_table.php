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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->string('cne_etudiant');
            $table->foreign('cne_etudiant')
            ->references('cne')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
              $table->unsignedBigInteger('id_Module');
            $table->foreign('id_Module')
            ->references('id')
            ->on('modules')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->boolean('absence')->default(false);
           
            $table->date('date_absence');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
