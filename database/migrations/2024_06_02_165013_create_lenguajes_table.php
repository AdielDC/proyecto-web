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
        Schema::create('lenguajes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('pronunciacion');
            $table->string('significado');
            $table->unsignedBigInteger('content_id');
            $table->timestamps();
            $table->foreign('content_id')->references('id')->on('contents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lenguajes');
    }
};