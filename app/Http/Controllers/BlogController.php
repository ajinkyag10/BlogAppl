<?php
namespace App\Http\Controllers;
use App\Services\BlogService;
use App\Services\CommentsService;
use Illuminate\Http\Request;
use App\Repositories\BlogRepository;
use App\Models\Blog;
class BlogController extends Controller
{
private $blogService;
private $commentsService;
private $blog;

public function __construct(BlogService $blogService,CommentsService $commentsService,Blog $blog){
$this->blogService = $blogService;
$this->commentsService = $commentsService;
$this->blog=$blog;

}
public function home(){
$blogslist=$this->blogService->index();
//return response()->json(['success' => $blogslist]); 
return view('/blogs.index',compact('blogslist'));
}
public function addBlog(){
return view('/blogs.create');
}
public function store(Request $request){
request()->validate([
'title'=>['required','min:3'],
'description'=>['required','min:3','max:500']
]);
$result = $this->blogService->createBlog($request);
if($result){
return redirect('/blogs');
}
}
public function details($id){
$blogdetails=$this->blogService->getBlogDetails($id);
$comments = $this->commentsService->getBlogComments($id);
return view('/blogs.show', compact('blogdetails','comments')); 
}
public function edit(Blog $blog)
{ 
return view('blogs.edit',compact('blog'));
}
public function update(Blog $blog)
{
$blog->update(request(['title','description']));
return redirect('/blogs');
}
public function destroy(Blog $blog)
{
$blog->delete();
return redirect('/blogs');
}
}