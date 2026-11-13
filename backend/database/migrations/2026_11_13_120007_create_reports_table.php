<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspector_id')->constrained('users')->restrictOnDelete();
            $table->enum('type', ['PET', 'PRODUTO', 'CONTA']);
            $table->unsignedBigInteger('target_id');
            $table->text('content');
            $table->text('error_description')->nullable();
            $table->enum('status', ['ABERTA', 'RESOLVIDA'])->default('ABERTA');
            $table->timestamps();

            $table->index(['type', 'target_id']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
