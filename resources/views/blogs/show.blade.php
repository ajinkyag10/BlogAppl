@extends('blogs.layout')
@section('content')
<div class="card ">
   <h5 class="card-header">{{ $blogdetails->title}}</h5>
   <div class="card-body">
      <p class="card-text">{{ $blogdetails->description }}</p>
   </div>
</div>
<form method="POST" action="#">
@csrf
<div class="box">
                <input name="blog_id" type="hidden" value="{{ Request::segment(1) }}">
            </div>
            <br>

<div class="field">
   <label for="Name" class="label">Name</label>
   <div class="control">
      <input type="text" class="input" placeholder="Enter name" name="name">
   </div>
</div>
<div class="field">
   <label for="Email" class="label">Email</label>
   <div class="control">
      <input type="email" class="input" placeholder="Enter email" name="email">
   </div>
</div>
<div class="field">
<label for="comment" class="label">Comment</label>
<div class="control">
   <textarea name="comment" class="input" placeholder="Enter Comment"></textarea>
</div>
<div class="control">
   <div class="row">
      <div class="col my-3">
         <button type="submit" class="btn btn-primary">Submit</button>
         <div class="container jumbotron  my-3">
            <h3 class="text-info">Comments</h3>
            @foreach( $comments  as $comment)
            <h5><b>{{ $comment->name }}</b></h5>
            <p>{{ $comment->comment }}</p>
            <hr class="border-primary">
            @endforeach
         </div>
      </div>
   </div>
</div>
<form>
@endsection