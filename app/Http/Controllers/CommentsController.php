<?php
namespace App\Http\Controllers;
use App\Services\CommentsService;
use Illuminate\Http\Request;
class CommentsController extends Controller
{
private $commentsService;
public function __construct(CommentsService $commentsService){
$this->commentsService = $commentsService;
}
public function store(Request $request,$id){
request()->validate([
'name'=>['required','min:3'],
'email'=>['required'],
'comment'=>['required','min:5','max:50']
]);
$result = $this->commentsService->createComment($request,$id);
if ($result) {
return back();
} else {
echo "error";
}
}
};

