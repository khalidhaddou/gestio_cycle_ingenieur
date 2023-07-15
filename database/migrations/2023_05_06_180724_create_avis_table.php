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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->unsignedBigInteger('id_publieur');
            $table->foreign('id_publieur')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('type');
            $table->string('fichier_pdf');
            $table->string('image');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
