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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('libelle');
            $table->integer('poids');
            $table->integer('prix');
            $table->unsignedBigInteger("exp_id");
            $table->foreign('exp_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger("dest_id");
            $table->foreign('dest_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger("fact_id");
            $table->foreign('fact_id')->references('id')->on('factures')->onDelete('cascade');
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
};
