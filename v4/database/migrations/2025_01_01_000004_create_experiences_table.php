<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('years')->nullable();
            $table->string('role')->nullable();
            $table->string('company')->nullable();
            $table->longText('description')->nullable();
            $table->text('tags')->nullable(); // JSON array
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('experiences');
    }
};
