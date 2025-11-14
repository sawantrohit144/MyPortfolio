<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('description')->nullable();
            $table->string('category')->nullable();
            $table->text('items')->nullable(); // JSON array
            $table->integer('proficiency')->default(0);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('skills');
    }
};
