

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
$table->unsignedInteger('blog_id');
// $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');

$table->string('name');
$table->string('email')->unique();
$table->string('comment');
$table->timestamps();
});
}
public function down()
{
    Schema::dropIfExists('comments');
}
}
