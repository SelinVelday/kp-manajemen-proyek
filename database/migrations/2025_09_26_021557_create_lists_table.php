<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            
            // Penting: Tipe data harus sama dengan projects.id (string)
            $table->string('project_id', 20); 
            
            $table->string('name');
            $table->integer('position')->default(0);
            $table->timestamps();

            // Definisikan Foreign Key manual karena tipe datanya string
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lists');
    }
};