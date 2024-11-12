<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submenus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
            $table->string('nama_submenu');
            $table->string('link_submenu');
            $table->string('icon_submenu')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submenus');
    }
};
