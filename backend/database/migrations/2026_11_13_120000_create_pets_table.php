<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registered_by')->constrained('users')->restrictOnDelete();
            $table->foreignId('adopted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->string('breed');
            $table->enum('species', ['CAO', 'GATO']);
            $table->string('location');
            $table->string('photo_url');
            $table->enum('status', ['DISPONIVEL', 'ADOTADO'])->default('DISPONIVEL');
            $table->timestamps();

            $table->index('species');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
