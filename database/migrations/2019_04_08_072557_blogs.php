<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Blogs extends Migration
{
public function up()

{
    
Schema::create('blogs', function (Blueprint $table) {
$table->increments('id');
$table->string('title');
$table->string('description');
$table->timestamps();
});
}
public function down()
{
Schema::dropIfExists('blogs');
}
}
