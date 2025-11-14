<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->boolean('available')->default(true);
            $table->string('badge_text')->nullable();
            $table->string('headline')->nullable();
            $table->string('highlighted_name')->nullable();
            $table->text('typed_texts')->nullable(); // JSON encoded array
            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_link')->nullable();
            $table->string('primary_button_icon')->nullable();
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_link')->nullable();
            $table->string('secondary_button_icon')->nullable();
            $table->string('scroll_text')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('hero_sections');
    }
};
