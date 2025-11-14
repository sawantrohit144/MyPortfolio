<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('lead')->nullable();
            $table->text('methods')->nullable(); // JSON array (email, phone, location)
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('contacts');
    }
};
