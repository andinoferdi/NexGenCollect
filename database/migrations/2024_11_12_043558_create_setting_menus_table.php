<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('setting_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
            $table->foreignId('submenu_id')->nullable()->constrained('submenus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setting_menus');
    }
};
