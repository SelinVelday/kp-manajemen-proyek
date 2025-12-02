<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_user', function (Blueprint $table) {
            $table->id(); // Sekarang punya ID sendiri (bukan composite key)
            $table->foreignId('team_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Relasi ke tabel Roles yang baru dibuat
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); 
            
            $table->timestamp('joined_at')->useCurrent();
            
            // Mencegah duplikasi user dalam satu tim
            $table->unique(['team_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_user');
    }
};