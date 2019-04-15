<?php
namespace App\Http\Controllers\API;
use App\Services\CommentsService;
use App\Services\BlogService;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class UserController extends Controller 
{
public $successStatus = 200;
private $blogService;
private $commentsService;
public function __construct(BlogService $blogService,CommentsService $commentsService){
$this->blogService = $blogService;
$this->commentsService = $commentsService;
}
public function login(){ 
if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
$user = Auth::user(); 
$success['token'] =  $user->createToken('MyApp')-> accessToken; 
return response()->json(['success' => $success], $this-> successStatus); 
} 
else{ 
return response()->json(['error'=>'Unauthorised'], 401); 
} 
}
/** 
* Register api 
* 
* @return \Illuminate\Http\Response 
*/ 
public function register(Request $request) 
{ 
$validator = Validator::make($request->all(), [ 
'name' => 'required', 
'email' => 'required|email', 
'password' => 'required', 
'c_password' => 'required|same:password', 
]);
if ($validator->fails()) { 
return response()->json(['error'=>$validator->errors()], 401);            
}
$input = $request->all(); 
$input['password'] = bcrypt($input['password']); 
$user = User::create($input); 
$success['token'] =  $user->createToken('MyApp')-> accessToken; 
$success['name'] =  $user->name;
return response()->json(['success'=>$success], $this-> successStatus); 
}
/** 
* details api 
* 
* @return \Illuminate\Http\Response 
*/ 
public function details() 
{ 
$user = Auth::user(); 
return response()->json(['success' => $user], $this-> successStatus); 
} 
public function home(){
$blogslist=$this->blogService->index();
return response()->json(['success' => $blogslist]); 
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
public function stores(Request $request,$id){
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
public function detail($id){
$blogdetails=$this->blogService->getBlogDetails($id);
$comments = $this->commentsService->getBlogComments($id);
return response()->json(['success' => $blogdetails,$comments]);
}
}

