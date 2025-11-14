<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
public function up()
{
Schema::create('footers', function (Blueprint $table) {
$table->id();
$table->string('github_link')->nullable();
$table->string('linkedin_link')->nullable();
$table->string('twitter_link')->nullable();
$table->string('footer_text')->nullable();
$table->timestamps();
});
}


public function down()
{
Schema::dropIfExists('footers');
}
};