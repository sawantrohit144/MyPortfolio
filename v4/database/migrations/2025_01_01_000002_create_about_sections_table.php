<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('lead_text')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->text('highlights')->nullable(); // JSON array of highlights
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('about_sections');
    }
};
