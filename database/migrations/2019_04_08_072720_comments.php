

<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Comments extends Migration
{

public function up()
{
Schema::create('comments', function (Blueprint $table) {
$table->bigIncrements('id');
$table->integer('blog_id');
$table->string('name');
$table->string('email');
$table->string('comment');
$table->timestamps();
});
}
public function down()
{
    Schema::dropIfExists('comments');
}
}
